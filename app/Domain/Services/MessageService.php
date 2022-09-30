<?php

namespace App\Domain\Services;

use App\Domain\Repositories\Message\MessageRepositoryInterface;

class MessageService extends MainService
{
    public MessageRepositoryInterface $messageRepository;
    public function __construct(MessageRepositoryInterface $messageRepository)
    {
        $this->messageRepository    =   $messageRepository;
    }
}
