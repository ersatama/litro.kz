<?php

namespace App\Domain\Requests\Code;

use App\Domain\Contracts\MainContract;
use App\Domain\Requests\MainRequest;

class CodeUpdateRequest extends MainRequest
{
    public function rules():array
    {
        return [
            MainContract::PHONE =>  'nullable|exists:codes,phone|max:255',
            MainContract::EMAIL =>  'nullable|exists:codes,email|max:255',
            MainContract::CODE  =>  'required|exists:codes|min:1000|max:9999|integer',
        ];
    }
}
