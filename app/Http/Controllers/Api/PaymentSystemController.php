<?php

namespace App\Http\Controllers\Api;

use App\Domain\Contracts\ErrorContract;
use App\Domain\Contracts\MainContract;
use App\Domain\Services\PaymentSystemService;
use App\Http\Controllers\Controller;
use App\Http\Resources\PaymentSystem\PaymentSystemCollection;
use App\Http\Resources\PaymentSystem\PaymentSystemResource;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PaymentSystemController extends Controller
{
    protected PaymentSystemService $paymentSystemService;
    public function __construct(PaymentSystemService $paymentSystemService)
    {
        $this->paymentSystemService =   $paymentSystemService;
    }

    /**
     * Получить список - PaymentSystem
     *
     * @group PaymentSystem - ПлатежСистема
     */
    public function get($skip,$take): Response|Application|ResponseFactory
    {
        return response([
            MainContract::COUNT =>  $this->paymentSystemService->paymentSystemRepository->count([]),
            MainContract::DATA  =>  new PaymentSystemCollection($this->paymentSystemService->paymentSystemRepository->get($skip,$take))
        ],200);
    }

    /**
     * Получить данные через ID - PaymentSystem
     *
     * @group PaymentSystem - ПлатежСистема
     */
    public function getById($id): Response|PaymentSystemResource|Application|ResponseFactory
    {
        if ($model = $this->paymentSystemService->paymentSystemRepository->getById($id)) {
            return new PaymentSystemResource($model);
        }
        return response(ErrorContract::ERROR_NOT_FOUND,404);
    }

}
