<?php

namespace Mpociot\ChuckNorrisJokes;

use Illuminate\Support\ServiceProvider;
use Mpociot\ChuckNorrisJokes\JokeFactory;

 
class ChuckNorrisJokesServiceProvider extends ServiceProvider
{
	
	public function boot()
	{
		# code...
	}

	public function register()
	{
		$this->app->bind('chuck-norris', function () {
			return new JokeFactory;
		});
	}
}