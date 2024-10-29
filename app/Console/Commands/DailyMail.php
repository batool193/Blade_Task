<?php

namespace App\Console\Commands;

use App\Models\Task;
use App\Jobs\SendEmail;
use Illuminate\Console\Command;

class DailyMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:daily-mail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        SendEmail::dispatch();
        info('Command run every day');
    }
}
