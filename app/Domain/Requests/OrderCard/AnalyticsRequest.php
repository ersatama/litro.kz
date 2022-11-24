<?php

namespace App\Domain\Requests\OrderCard;

use App\Domain\Contracts\Contract;
use App\Domain\Requests\MainRequest;

class AnalyticsRequest extends MainRequest
{
    public function rules():array
    {
        return [
            Contract::START_DATE    =>  'nullable',
            Contract::END_DATE      =>  'nullable',
            Contract::UTM_CAMPAIGN  =>  'nullable'
        ];
    }

    public function checked(): array
    {
        $data   =   $this->validator->validated();
        if (array_key_exists(Contract::START_DATE,$data)) {
            $data[Contract::START_DATE] =   json_decode($data[Contract::START_DATE],true);
        }
        if (array_key_exists(Contract::END_DATE,$data)) {
            $data[Contract::END_DATE]   =   json_decode($data[Contract::END_DATE],true);
        }
        return $data;
    }
}
