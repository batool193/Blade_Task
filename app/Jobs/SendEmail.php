<?php

namespace App\Jobs;

use App\Mail\PendingTasksMail;
use App\Models\User;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendEmail implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $users = User::all();
        foreach ($users as $user) {
            $tasks = $user->tasks()->where('status', 'Pending')->get();
            Mail::to($user->mail)->send(new PendingTasksMail($tasks,$user));
        }


    }
}
