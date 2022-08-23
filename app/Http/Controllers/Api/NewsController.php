<?php

namespace App\Http\Controllers\Api;

use App\Domain\Contracts\ErrorContract;
use App\Domain\Contracts\MainContract;
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

    /**
     * Получить список - News
     *
     * @group News - Новости
     */
    public function get($skip,$take): Response|Application|ResponseFactory
    {
        return response([
            MainContract::COUNT =>  $this->newsService->newsRepository->count([]),
            MainContract::DATA  =>  new NewsCollection($this->newsService->newsRepository->get($skip,$take))
        ],200);
    }

    /**
     * Получить данные через ID - News
     *
     * @group News - Новости
     */
    public function getById($id): Response|NewsResource|Application|ResponseFactory
    {
        if ($news = $this->newsService->newsRepository->getById($id)) {
            return new NewsResource($news);
        }
        return response(ErrorContract::ERROR_NOT_FOUND,404);
    }

}
