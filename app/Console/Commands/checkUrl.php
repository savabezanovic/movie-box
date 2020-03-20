<?php

namespace App\Console\Commands;

use App\Check;
use App\ProjectUrl;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class CheckUrl extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:checkUrl';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check Url and save status ';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $urls = ProjectUrl::all();

        foreach ($urls as $url) {
            if (Carbon::now()->diffInMilliseconds($url->checked_at) > $url->frequency->seconds * 1000) {

                $check = new Check();

                $timeBefore = Carbon::now();
                $response = Http::get($url->url);
                $timeAfter = Carbon::now();

                $check->url_id = $url->id;
                $check->response_status = $response->status();
                $check->response_time = $timeAfter->diffInMilliseconds($timeBefore);

                $url->checked_at = Carbon::now();

                $url->save();
                $check->save();
            }
        }
    }
}
