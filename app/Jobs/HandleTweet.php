<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class HandleTweet implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $tweet;
    
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($tweet)
    {
        $this->tweet = $tweet;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $tweet = $this->tweet;
        //var_dump($tweet['text']) . PHP_EOL;
        //var_dump($tweet['id_str']) . PHP_EOL;
        if($tweet['user']['followers_count']>1000 && $tweet['user']['followers_count'] < 5000){
            config('app.listFeed')->insert([
                'profilename' => $tweet['user']['name'],
                'totalfollowers' => $tweet['user']['followers_count'],
                ]);
                echo '-------------------------------------------------------'. PHP_EOL;
                echo $tweet['user']['name'].' '.$tweet['user']['followers_count'] . PHP_EOL;  
                echo '-------------------------------------------------------'. PHP_EOL;  
        }
    }
}
