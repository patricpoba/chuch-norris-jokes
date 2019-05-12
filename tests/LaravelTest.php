<?php

namespace Mpociot\ChuckNorrisJokes\Tests;
 
use Illuminate\Support\Facades\Artisan;
use Mpociot\ChuckNorrisJokes\ChuckNorrisJokesServiceProvider;
use Mpociot\ChuckNorrisJokes\Facades\ChuckNorris;
use Orchestra\Testbench\TestCase;

class LaravelTest extends TestCase
{
	
	protected function getPackageProviders($app)
	{
		return [ChuckNorrisJokesServiceProvider::class];
	}

	protected function getPackageAliases($app)
	{
	    return [
	        'ChuckNorris' => ChuckNorris::class
	    ];
	}

	/** @test */
	public function the_console_command_returns_a_joke()
	{
		$this->withoutMockingConsoleOutput();

		ChuckNorris::shouldReceive('getRandomJoke')
			->once()
			->andReturn('some joke');

		$this->artisan('chuck-norris');

		$output = Artisan::output();

		$this->assertSame('some joke'. PHP_EOL, $output);
	}

	/** @test */
	public function the_route_can_be_accessed()
	{
		$this->get('/chuck-norris')
				->assertStatus(200);
	}

	/** @test */
	public function the_route_page_contains_a_joke()
	{
		ChuckNorris::shouldReceive('getRandomJoke')->once()->andReturn('some joke');
		
		$pageContent = $this->get('/chuck-norris')->getContent();

		$this->assertStringContainsString('some joke', $pageContent);
	}
	 
}