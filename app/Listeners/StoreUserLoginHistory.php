<?php

namespace App\Listeners;

use App\Events\LoginHistory;
use Carbon\Carbon;
use DB;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class StoreUserLoginHistory
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(LoginHistory $event): void
    {
        $current_timestamp = Carbon::now()->toDateTimeString();
        $user = $event->user;

        DB::table('login_logs')->insert([
            'email' => $user->email,
            'created_at' => $current_timestamp,
            'updated_at' => $current_timestamp
        ]);
    }
}
