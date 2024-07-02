<?php

namespace App\Console\Commands;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;



class trainChatbot extends Command
{
    protected $signature = 'app:train-chatbot';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    public function runcode(){
        $Run_URL = env('Run_URL');
        $response = Http::get($Run_URL, []);
        return $response->json()['match_percentage'];


    }

}
