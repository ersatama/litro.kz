<?php

namespace App\Http\Controllers\Api;

use App\Domain\Services\NewsService;
use App\Http\Controllers\Controller;
use App\Http\Resources\News\NewsCollection;
use App\Http\Resources\News\NewsResource;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Response;

class NewsController extends Controller
{
    protected NewsService $newsService;
    public function __construct(NewsService $newsService)
    {
        $this->newsService  =   $newsService;
    }

    public function get(): NewsCollection
    {
        return new NewsCollection($this->newsService->get());
    }

    public function getById($id): Response|NewsResource|Application|ResponseFactory
    {
        if ($news = $this->newsService->getById($id)) {
            return new NewsResource($news);
        }
        return response(['message'  =>  'News not found'],404);
    }

}
