<?php

namespace Tests\Feature;

use App\Models\Author;
use App\Models\Book;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * End-to-end checks that the main pages and the image pipeline still work after the
 * Laravel 12 / PHP 8.5 upgrade. Deprecation handling is disabled, so any PHP deprecation
 * raised while serving a request fails the test instead of being silently logged.
 */
class SmokeTest extends TestCase {
	use RefreshDatabase;

	private string $site = 'http://marat.test';
	private string $admin = 'http://admin.marat.test';

	protected function setUp(): void {
		parent::setUp();
		$this->withoutDeprecationHandling();
	}

	private function makeBook(string $title = 'Libro de prueba'): Book {
		$book = Book::forceCreate([
			'title' => $title,
			'pages' => 120,
			'about' => 'Un libro para pruebas.',
			'published' => '2020-01-01',
			'price' => 15.50,
			'ISBN' => '978-0-00-000000-0',
			'sale_link' => 'https://example.com/libro',
		]);

		// The book page assumes every book has at least one author.
		$book->authors()->attach(Author::forceCreate([
			'name' => 'Autora de prueba',
			'about' => 'Una autora para pruebas.',
		]));

		return $book;
	}

	#[Test]
	public function catalogue_page_lists_books(): void {
		$this->makeBook();

		$this->get("{$this->site}/")
			->assertOk()
			->assertSee('Libro de prueba');
	}

	#[Test]
	public function book_page_renders(): void {
		$book = $this->makeBook();

		$this->get("{$this->site}/" . rawurlencode($book->title))
			->assertOk()
			->assertSee('Libro de prueba');
	}

	#[Test]
	public function admin_login_page_renders(): void {
		$this->get("{$this->admin}/login")->assertOk();
	}

	#[Test]
	public function admin_redirects_guests_to_login(): void {
		$this->get("{$this->admin}/libros")->assertRedirect("{$this->admin}/login");
	}

	#[Test]
	public function photo_upload_is_resized_and_stored_as_jpeg(): void {
		Storage::fake('local');
		$book = $this->makeBook();

		$this->actingAs(User::factory()->create())
			->post("{$this->admin}/libros/photo/" . rawurlencode($book->title), [
				'photo' => UploadedFile::fake()->image('portada.png', 1600, 1200),
			])
			->assertSuccessful();

		$photo = $book->photos()->sole();
		$this->assertStringEndsWith('.jpeg', $photo->file);

		$path = "public/photos/{$photo->file}";
		Storage::disk('local')->assertExists($path);

		$stored = ImageManager::gd()->read(Storage::disk('local')->get($path));
		$this->assertSame(800, $stored->width());
		$this->assertSame(600, $stored->height());
	}
}
