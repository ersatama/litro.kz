<?php

namespace App\Domain\Requests\Code;

use App\Domain\Contracts\Contract;
use App\Domain\Requests\MainRequest;

class CodeCreateRequest extends MainRequest
{
    public function rules():array
    {
        return [
            Contract::PHONE =>  'nullable|unique:users|max:255',
            Contract::EMAIL =>  'nullable|unique:users|max:255',
        ];
    }

    public function checked(): array
    {
        $data   =   $this->validator->validated();
        $data[Contract::CODE]   =   rand(1000,9999);
        $data[Contract::STATUS] =   false;
        return $data;
    }
}
