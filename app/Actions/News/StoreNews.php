<?php

namespace App\Actions\News;

use App\Events\NewsCreatedHistory;
use App\Http\Requests\News\StorePostRequest;
use App\Models\News;

class StoreNews {

    public function handle(StorePostRequest $request): News
    {
        $news = News::create([
            'title' => $request->title,
            'content' => $request->content,
            'author' => $request->user()->id
        ]);

        if ($request->file('image')) {
            $path = $request->file('image')->store('image', 'public');
            $news->update(['image' => $path]);
        }

        NewsCreatedHistory::dispatch($news);

        return $news;
    }
}