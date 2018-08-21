<?php

namespace Tests\Feature;

use Tests\TestCase;
use Mockery as m;
use App\Console\Commands\TwitterConnectionHandler;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TwitterConnectionHandlerTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     * 
     * @test
     */
    public function expects_a_hashtag_from_command_prompt()
    {
        $command = m::mock('TwitterConnectionHandler[ask]');
        $command->shouldReceive('ask')
                ->once()
                ->with('Enter the hashtag?')
                ->andReturn('#Something');;

    }
}
