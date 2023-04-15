<?php

namespace App\Http\Controllers;

use App\Actions\News\DeleteNews;
use App\Actions\News\StoreNews;
use App\Actions\News\UpdateNews;
use App\Http\Requests\News\StorePostRequest;
use App\Http\Requests\News\UpdatePostRequest;
use App\Http\Resources\NewsDetailResource;
use App\Http\Resources\NewsResource;
use App\Models\News;

class NewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:manage-news')->except('index', 'show');    
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return NewsResource::collection(News::paginate(25));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request, StoreNews $storeNews)
    {
        return NewsResource::make($storeNews->handle($request));
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        return NewsDetailResource::make($news);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, News $news, UpdateNews $updateNews)
    {
        return NewsResource::make($updateNews->handle($request, $news));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news, DeleteNews $deleteNews)
    {
        $deleteNews->handle($news);

        return response()->json([
            'success' => true,
            'message' => 'Deleted Successfuly'
        ]);
    }
}
