<?php

namespace App\Domain\Contracts;

class NewsContract extends MainContract
{
    const TABLE =   'news';
    const FILLABLE  =   [
        self::ID,
        self::TITLE,
        self::TITLE_KZ,
        self::TITLE_EN,
        self::DESCRIPTION,
        self::DESCRIPTION_KZ,
        self::DESCRIPTION_EN,
        self::IMAGE_ID,
        self::CATEGORY_NEWS_ID,
        self::IS_ACTIVE,
        self::LINK
    ];
}
