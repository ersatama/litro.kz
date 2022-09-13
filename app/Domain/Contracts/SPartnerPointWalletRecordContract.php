<?php

namespace App\Domain\Contracts;

class SPartnerPointWalletRecordContract extends MainContract
{
    const TABLE =   's_partner_point_wallet_records';
    const FILLABLE  =   [
        self::S_PARTNER_POINT_WALLET_ID,
        self::S_PARTNER_RECEIVED_ID,
        self::TYPE,
        self::STATUS,
        self::SUM,
        self::PREVIOUS_BALANCE,
        self::PAYMENT_ID,
    ];
}
