<?php

namespace App\Domain\Contracts;

class CategoryContract extends MainContract
{
    const TABLE =   'categories';
    const FILLABLE  =   [
        self::IMAGE_ID,
        self::TITLE,
        self::TITLE_KZ,
        self::TITLE_EN,
        self::DESCRIPTION,
        self::DESCRIPTION_KZ,
        self::DESCRIPTION_EN,
    ];
}
