<?php

namespace Mpociot\ChuckNorrisJokes;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Mpociot\ChuckNorrisJokes\Console\ChuckNorrisJoke;
use Mpociot\ChuckNorrisJokes\Http\Controllers\ChuckNorrisController;
use Mpociot\ChuckNorrisJokes\JokeFactory;

 
class ChuckNorrisJokesServiceProvider extends ServiceProvider
{
	
	public function boot()
	{
		if ($this->app->runningInConsole()) {
			$this->commands([
					ChuckNorrisJoke::class
			]);
		}

		Route::get('chuck-norris', ChuckNorrisController::class);

	}

	public function register()
	{
		$this->app->bind('chuck-norris', function () {
			return new JokeFactory;
		});
	}
}