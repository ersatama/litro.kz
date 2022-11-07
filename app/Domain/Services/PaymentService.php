<?php

namespace App\Domain\Services;

use App\Domain\Repositories\Payment\PaymentRepositoryInterface;

class PaymentService extends MainService
{
    public PaymentRepositoryInterface $paymentRepository;
    public function __construct(PaymentRepositoryInterface $paymentRepository)
    {
        $this->paymentRepository    =   $paymentRepository;
    }
}
