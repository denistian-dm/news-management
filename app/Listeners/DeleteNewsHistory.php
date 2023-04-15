<?php

namespace App\Listeners;

use App\Events\NewsDeleteHistory;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;

class DeleteNewsHistory
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
    public function handle(NewsDeleteHistory $event): void
    {
        $current_timestamp = Carbon::now()->toDateTimeString();
        $news = $event->news;

        DB::table('news_deleted_logs')->insert([
            'news_id' => $news->id,
            'user_id' => $news->author,
            'created_at' => $current_timestamp,
            'updated_at' => $current_timestamp
        ]);
    }
}
