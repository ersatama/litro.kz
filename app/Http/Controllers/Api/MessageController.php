<?php

namespace App\Http\Controllers\Api;

use App\Domain\Contracts\Contract;
use App\Domain\Contracts\ErrorContract;
use App\Domain\Services\MessageService;
use App\Http\Controllers\Controller;
use App\Http\Resources\Message\MessageCollection;
use App\Http\Resources\Message\MessageResource;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MessageController extends Controller
{
    protected MessageService $messageService;
    public function __construct(MessageService $messageService)
    {
        $this->messageService   =   $messageService;
    }

    /**
     * Получить список - Message
     *
     * @group Message
     */
    public function get($skip,$take): Response|Application|ResponseFactory
    {
        return response([
            Contract::COUNT =>  $this->messageService->messageRepository->count([]),
            Contract::DATA  =>  new MessageCollection($this->messageService->messageRepository->get($skip,$take))
        ],200);
    }


    /**
     * Получить данные через ID - Message
     *
     * @group Message
     */
    public function getById($id): Response|MessageResource|Application|ResponseFactory
    {
        if ($model = $this->messageService->messageRepository->getById($id)) {
            return new MessageResource($model);
        }
        return response(ErrorContract::ERROR_NOT_FOUND,404);
    }
}
