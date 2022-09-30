<?php

namespace App\Domain\Contracts;

class ServiceContract extends Contract
{
    const TABLE =   'services';
    const FILLABLE  =   [
        self::TITLE,
        self::TITLE_KZ,
        self::TITLE_EN,
        self::VIEW,
        self::VIEW_KZ,
        self::VIEW_EN,
        self::DESCRIPTION,
        self::DESCRIPTION_KZ,
        self::DESCRIPTION_EN,
        self::TAGLINE,
        self::TAGLINE_KZ,
        self::TAGLINE_EN,
        self::ANNOTATION,
        self::ANNOTATION_KZ,
        self::ANNOTATION_EN,
        self::SERVICE_TYPE_ID,
        self::POSITION,
        self::IS_ACTIVE,
        self::URL,
        self::PRICE,
        self::CARD_PRICE,
        self::SELECTABLE,
        self::WITHOUT_CARD,
        self::WITH_CARD,
        self::NOTE_STARS,
        self::IS_CORPORATE,
        self::IMAGE_ID,
        self::BROWSER_IMAGE_ID,
        self::ADDITIONAL_IMAGE_ID,
    ];
}
