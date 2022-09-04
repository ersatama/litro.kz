<?php

namespace App\Domain\Services;

use App\Domain\Repositories\PaymentSystem\PaymentSystemRepositoryInterface;

class PaymentSystemService extends MainService
{
    public PaymentSystemRepositoryInterface $paymentSystemRepository;
    public function __construct(PaymentSystemRepositoryInterface $paymentSystemRepository)
    {
        $this->paymentSystemRepository  =   $paymentSystemRepository;
    }
}
