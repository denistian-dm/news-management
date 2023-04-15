<?php

namespace App\Listeners;

use App\Events\NewsCreatedHistory;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;

class StoreNewsHistory
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
    public function handle(NewsCreatedHistory $event): void
    {
        $current_timestamp = Carbon::now()->toDateTimeString();
        $news = $event->news;

        DB::table('news_created_logs')->insert([
            'news_id' => $news->id,
            'user_id' => $news->author,
            'title' => $news->title,
            'content' => $news->content,
            'image' => $news->image,
            'created_at' => $current_timestamp,
            'updated_at' => $current_timestamp
        ]);
    }
}
