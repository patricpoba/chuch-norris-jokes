<?php

use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use GuzzleHttp\Handler\MockHandler;
use Mpociot\ChuckNorrisJokes\JokeFactory;

class JokeFactoryTest extends TestCase
{
    /** @test */
    public function it_returns_a_random_joke()
    {
        $mock = new MockHandler([
            new Response(200, [], '{"type":"success","value":{"id":318,"joke":"If you work in an office with Chuck Norris, don\'t ask him for his three-hole-punch.","categories":[]}}'),
        ]);

        $handler = HandlerStack::create($mock);

        $client = new Client(['handler'=>$handler]);

        $jokes = new JokeFactory($client);

        $joke = $jokes->getRandomJoke();

        $this->assertSame("If you work in an office with Chuck Norris, don't ask him for his three-hole-punch.", $joke);
    }

    /* @test */
    // public function it_returns_a_predefined_joke()
    // {
    //     $chuchJokes = [
    //         'The First rule of Chuck Norris is: you do not talk about Chuck Norris.',
    //         'Chuck Norris does not wear a condom. Because there is no such thing as protection from Chuck Norris.',
    //         'Chuck Norris\' tears cure cancer. Too bad he has never cried.',
    //         'Chuck Norris counted to infinity... Twice.',
    //     ];

    //     $jokes = new JokeFactory($chuchJokes);

    //     $joke = $jokes->getRandomJoke();

    //     $this->assertContains($joke, $chuchJokes);
    // }
}
