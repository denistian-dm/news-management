<?php

namespace App\Actions\Comment;

use App\Http\Requests\Comment\StorePostRequest;
use App\Jobs\ProcessStoreComment;

class StoreComment {

    public function handle(StorePostRequest $request): void
    {
        $data = $request->all();
        $data['user_id'] = $request->user()->id;

        ProcessStoreComment::dispatch($data);
    }
}