<?php

namespace App\Domain\Repositories\PaymentSystem;

use App\Domain\Repositories\MainRepositoryEloquent;
use App\Models\Payment;

class PaymentSystemRepositoryEloquent implements PaymentSystemRepositoryInterface
{
    use MainRepositoryEloquent;
    protected Payment $model;
    public function __construct(Payment $payment)
    {
        $this->model    =   $payment;
    }
}
