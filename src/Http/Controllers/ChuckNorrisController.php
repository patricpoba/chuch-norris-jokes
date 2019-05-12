<?php

namespace Mpociot\ChuckNorrisJokes\Http\Controllers;

use Mpociot\ChuckNorrisJokes\Facades\ChuckNorris;

class ChuckNorrisController  
{
	
	public function __invoke()
	{
		return ChuckNorris::getRandomJoke();
	}
}