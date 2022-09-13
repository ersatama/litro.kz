<?php

namespace App\Domain\Contracts;

class LawyerContactAccessContract extends MainContract
{
    const TABLE =   'lawyer_contact_accesses';
    const FILLABLE  =   [
        self::LAWYER_ID,
        self::USER_ID
    ];
}
