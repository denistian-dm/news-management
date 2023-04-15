<?php

namespace App\Actions\News;

use App\Events\NewsDeleteHistory;
use App\Models\News;

class DeleteNews {

    public function handle(News $news): void
    {
        $news->delete();
        NewsDeleteHistory::dispatch($news);
    }
}