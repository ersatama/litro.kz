<?php

namespace App\Domain\Repositories\Payment;

use App\Domain\Repositories\MainRepositoryEloquent;
use App\Models\Payment;

class PaymentRepositoryEloquent implements PaymentRepositoryInterface
{
    use MainRepositoryEloquent;
    protected Payment $model;
    public function __construct(Payment $payment)
    {
        $this->model    =   $payment;
    }
}
