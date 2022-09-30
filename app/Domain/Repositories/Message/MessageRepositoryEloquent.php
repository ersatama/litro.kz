<?php

namespace App\Domain\Repositories\Message;

use App\Domain\Repositories\MainRepositoryEloquent;
use App\Models\Message;

class MessageRepositoryEloquent implements MessageRepositoryInterface
{
    use MainRepositoryEloquent;
    protected Message $model;
    public function __construct(Message $message)
    {
        $this->model    =   $message;
    }
}
