<?php

namespace App\Domain\Requests\Code;

use App\Domain\Contracts\MainContract;
use App\Domain\Requests\MainRequest;

class CodeCreateRequest extends MainRequest
{
    public function rules():array
    {
        return [
            MainContract::PHONE =>  'nullable|unique:users|max:255',
            MainContract::EMAIL =>  'nullable|unique:users|max:255',
        ];
    }

    public function checked(): array
    {
        $data   =   $this->validator->validated();
        $data[MainContract::CODE]   =   rand(1000,9999);
        $data[MainContract::STATUS] =   false;
        return $data;
    }
}
