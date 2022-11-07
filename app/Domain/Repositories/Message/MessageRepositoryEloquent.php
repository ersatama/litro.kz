<?php

namespace App\Domain\Repositories\Message;

use App\Domain\Repositories\RepositoryEloquent;
use App\Models\Message;

class MessageRepositoryEloquent implements MessageRepositoryInterface
{
    use RepositoryEloquent;
    protected Message $model;
    public function __construct(Message $message)
    {
        $this->model    =   $message;
    }
}
