<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReminderEmail;
use App\Models\User;
use App\Models\Reservation;
use Carbon\Carbon;

class RemindEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'remind:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send email to new user after the registration';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $today = Carbon::today()->format('Y-m-d');
        $reservations = Reservation::where('date', $today)->get();

        if (!empty($reservations)) {
            foreach ($reservations as $reservation) {
                $user = User::where('id', $reservation->user_id)->first();
                $email = $user->email;
                $reminder_email = new ReminderEmail($user);
                Mail::to($email)
                    ->send($reminder_email);
            }
        }
    }
}
