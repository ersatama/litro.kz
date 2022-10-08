<?php

namespace App\Domain\Helpers;

use App\Domain\Contracts\Contract;

class Sms
{
    protected Curl $curl;

    public function __construct(Curl $curl)
    {
        $this->curl =   $curl;
    }

    public function send($phone,$message): void
    {
        $this->curl->get($this->params([
            Contract::PHONES    =>  $phone,
            Contract::MES       =>  $message
        ]));
    }

    public function params($params): string
    {
        $params[Contract::LOGIN]    =   config('sms.login');
        $params[Contract::PSW]      =   config('sms.password');
        $params =   http_build_query($params);
        return config('sms.url').$params;
    }
}
