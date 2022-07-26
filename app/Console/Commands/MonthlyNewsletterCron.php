<?php

namespace App\Console\Commands;

use App\Mail\MonthlyNewsletterMail;
use App\Models\Customer;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class MonthlyNewsletterCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'monthlynewsletter:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'sends mail on sending days';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $customers= Customer::where("is_subscribe",1)->get();

        foreach($customers as $key => $customer)
        {
            $email = $customer->email;

            Mail::to($email)->send(new MonthlyNewsletterMail($customer));
        }
    }
}
