<?php

namespace App\Console\Commands;

use App\Mail\WelcomeEmail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class emailCronJob extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $user = Auth::user();
        if($user->email == request('email')) {
            Mail::to(Auth::user())->send(new WelcomeEmail());
        }
    }
}
