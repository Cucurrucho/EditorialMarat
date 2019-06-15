<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('books', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->string('title');
			$table->integer('pages');
			$table->text('about');
			$table->date('published');
			$table->decimal('price');
			$table->string('translation')->nullable();
			$table->string('ISBN');
			$table->string('sale_link');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('books');
	}
}
