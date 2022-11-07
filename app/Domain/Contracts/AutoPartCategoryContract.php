<?php

namespace App\Domain\Contracts;

class AutoPartCategoryContract extends Contract
{
    const TABLE =   'auto_part_categories';
    const FILLABLE  =   [
        self::POSITION,
        self::PARENT_ID,
        self::TITLE,
        self::TITLE_KZ,
        self::TITLE_EN,
        self::DESCRIPTION,
        self::DESCRIPTION_KZ,
        self::DESCRIPTION_EN,
    ];
}
