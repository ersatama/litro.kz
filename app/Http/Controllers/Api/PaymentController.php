<?php

namespace App\Http\Controllers\Api;

use App\Domain\Contracts\ErrorContract;
use App\Domain\Contracts\Contract;
use App\Domain\Services\PaymentService;
use App\Http\Controllers\Controller;
use App\Http\Resources\Payment\PaymentCollection;
use App\Http\Resources\Payment\PaymentResource;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PaymentController extends Controller
{
    protected PaymentService $paymentService;
    public function __construct(PaymentService $paymentService)
    {
        $this->paymentService   =   $paymentService;
    }

    /**
     * Получить список - Payment
     *
     * @group Payment - Платеж
     */
    public function get($skip,$take): Response|Application|ResponseFactory
    {
        return response([
            Contract::COUNT =>  $this->paymentService->paymentRepository->count([]),
            Contract::DATA  =>  new PaymentCollection($this->paymentService->paymentRepository->get($skip,$take))
        ],200);
    }

    /**
     * Получить данные через UserID - Payment
     *
     * @group Payment - Платеж
     */
    public function getByUserId($userId,$skip,$take): Response|Application|ResponseFactory
    {
        return response([
            Contract::COUNT =>  $this->paymentService->paymentRepository->count([
                Contract::USER_ID   =>  $userId
            ]),
            Contract::DATA  =>  new PaymentCollection($this->paymentService->paymentRepository->getByUserId($userId,$skip,$take))
        ],200);
    }

    /**
     * Получить данные через ID - Payment
     *
     * @group Payment - Платеж
     */
    public function getById($id): Response|PaymentResource|Application|ResponseFactory
    {
        if ($model = $this->paymentService->paymentRepository->getById($id)) {
            return new PaymentResource($model);
        }
        return response(ErrorContract::ERROR_NOT_FOUND,404);
    }

}
