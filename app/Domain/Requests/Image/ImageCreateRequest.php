<?php

namespace App\Domain\Requests\Image;

use App\Domain\Contracts\Contract;
use App\Domain\Requests\MainRequest;

class ImageCreateRequest extends MainRequest
{

    public function rules():array
    {
        return [
            Contract::USER_ID   =>  'nullable|exists:users,id',
            Contract::IMAGE =>  'required|file|max:10240',
        ];
    }

    public function checked(): array
    {
        return $this->validator->validated();
    }
}
