<?php

namespace App\Domain\Requests\OrderCard;

use App\Domain\Contracts\Contract;
use App\Domain\Requests\MainRequest;

class SaveExcelRequest extends MainRequest
{
    public function rules():array
    {
        return [
            Contract::DATA  =>  'required'
        ];
    }

    public function checked():array
    {
        $data   =   $this->validator->validated();
        return $data[Contract::DATA];
    }
}
