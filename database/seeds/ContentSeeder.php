<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ContentSeeder extends Seeder {


	public function run(Faker $faker) {
		$this->contentFakeNoOverwrite('sobre', $faker->paragraph);
	}

	protected function contentFakeNoOverwrite($key, $value) {
		$content = app('content');

		if ($content->get($key) === null) {
			$content->put($key, $value);
		}
	}
}
