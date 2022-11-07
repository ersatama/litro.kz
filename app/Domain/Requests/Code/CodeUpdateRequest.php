<?php

namespace App\Domain\Requests\Code;

use App\Domain\Contracts\Contract;
use App\Domain\Requests\MainRequest;

class CodeUpdateRequest extends MainRequest
{
    public function rules():array
    {
        return [
            Contract::PHONE =>  'nullable|exists:codes,phone|max:255',
            Contract::EMAIL =>  'nullable|exists:codes,email|max:255',
            Contract::CODE  =>  'required|exists:codes|min:1000|max:9999|integer',
        ];
    }
}
