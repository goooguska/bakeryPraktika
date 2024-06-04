<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Http\Requests\StoreNewsRequest;
use App\Http\Requests\UpdateNewsRequest;
use App\Http\Resources\NewsCollection;
use App\Http\Resources\NewsResource;

class NewsController extends Controller
{
   
    public function index()
    {
        $news = News::all();
        return new NewsCollection($news);
    }
    public function store(StoreNewsRequest $request)
    {
        $data = $request->validated();
        $news = News::create($data);
        return response()->noContent(201)->withHeaders([
            'Location' => route('news.show', [
                'news' => $news->id,
            ]),
        ]);

    }
    public function show(News $news)
    {
        return new NewsResource($news);

    }
    public function update(UpdateNewsRequest $request, News $news)
    {
        $data = $request->validated();
        $news->update($data);
        return response()->noContent(204);
    }
    public function destroy(News $news)
    {
        $news->delete();
        return response()->noContent(204);
    }
}
