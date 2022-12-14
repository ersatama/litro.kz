<?php

namespace App\Domain\Contracts;

class NewsCategoryContract extends Contract
{
    const TABLE =   'news_categories';
    const FILLABLE  =   [
        self::TITLE,
        self::TITLE_KZ,
        self::TITLE_EN,
    ];
}
