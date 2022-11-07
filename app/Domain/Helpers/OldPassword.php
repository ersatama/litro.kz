<?php

namespace App\Domain\Helpers;

use App\Domain\Contracts\Contract;

class OldPassword
{
    protected Curl $curl;
    const URL   =   'https://litro-admin.mars.studio/sign-in/login?';

    public function __construct(Curl $curl)
    {
        $this->curl =   $curl;
    }

    public function check($password,$hashed): bool
    {
        $result =   $this->curl->get(self::URL.http_build_query([
            Contract::PASSWORD  =>  $password,
            Contract::HASHED    =>  $hashed
        ]));
        if ($result === 'ok') {
            return true;
        }
        return false;
    }
}
