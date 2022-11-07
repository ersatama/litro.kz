<?php

namespace App\Domain\Contracts;

class LawyerContactContract extends Contract
{
    const TABLE =   'lawyer_contacts';
    const FILLABLE  =   [
        self::LAWYER_ID,
        self::PHONE
    ];
}
