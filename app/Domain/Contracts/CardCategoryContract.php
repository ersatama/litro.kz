<?php

namespace App\Domain\Contracts;

class CardCategoryContract extends MainContract
{
    const TABLE =   'card_categories';
    const FILLABLE  =   [
        self::TITLE,
        self::TITLE_KZ,
        self::TITLE_EN,
        self::DESCRIPTION,
        self::DESCRIPTION_KZ,
        self::DESCRIPTION_EN,
        self::IMAGE_ID
    ];
}
