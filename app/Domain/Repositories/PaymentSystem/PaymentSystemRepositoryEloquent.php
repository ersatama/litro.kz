<?php

namespace App\Domain\Repositories\PaymentSystem;

use App\Domain\Repositories\RepositoryEloquent;
use App\Models\PaymentSystem;

class PaymentSystemRepositoryEloquent implements PaymentSystemRepositoryInterface
{
    use RepositoryEloquent;
    protected PaymentSystem $model;
    public function __construct(PaymentSystem $payment)
    {
        $this->model    =   $payment;
    }
}
