<?php

namespace App\Actions\News;

use App\Events\NewsUpdatedHistory;
use App\Http\Requests\News\UpdatePostRequest;
use App\Models\News;

class UpdateNews {

    public function handle(UpdatePostRequest $request, News $news): News
    {
        $news->update($request->except('image', 'author'));

        if ($request->file('image')) {
            $path = $request->file('image')->store('image', 'public');
            $news->update(['image' => $path]);
        }

        NewsUpdatedHistory::dispatch($news);

        return $news;
    }
}