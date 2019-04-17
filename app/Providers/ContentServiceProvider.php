<?php

namespace App\Providers;

use ElCoop\Valuestore\Valuestore;
use Illuminate\Support\ServiceProvider;

class ContentServiceProvider extends ServiceProvider {
	/**
	 * Register services.
	 *
	 * @return void
	 */
	public function register() {
		//
	}

	/**
	 * Bootstrap services.
	 *
	 * @return void
	 */
	public function boot() {
		$this->app->singleton('content', function ($app) {
			return new Valuestore(database_path('content.json'));
		});
	}
}
