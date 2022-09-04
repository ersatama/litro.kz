<?php

namespace App\Domain\Contracts;

abstract class MainContract
{
    const ORDER_ID  =   'order_id';
    const SALT  =   'salt';
    const RESULT    =   'result';
    const NEXT_PAYMENT  =   'next_payment';
    const RECURRING_PROFILE_ID  =   'recurring_profile_id';
    const CARD_PAN  =   'card_pan';
    const PAYMENT_DATE  =   'payment_date';
    const AMOUNT    =   'amount';
    const PAYMENT_KEY   =   'payment_key';
    const PAYMENT_SYSTEM_INFO   =   'payment_system_info';
    const PAYMENT_SYSTEM_ID =   'payment_system_id';
    const CURRENCY_ID   =   'currency_id';
    const SUM   =   'sum';
    const TOKEN =   'token';
    const IS_CARD   =   'is_card';
    const REVIEW    =   'review';
    const ADDRESS   =   'address';
    const OLD_PRICE =   'old_price';
    const PLACE_ID  =   'place_id';
    const MASTER_ID =   'master_id';
    const CURRENT_TIMESTAMP =   'CURRENT_TIMESTAMP';
    const IMPORT_ID =   'import_id';
    const IS_FROM_EXCEL =   'is_from_excel';
    const UTM_CAMPAIGN  =   'utm_campaign';
    const PAYMENT_METHOD    =   'payment_method';
    const ACTIVATE_DATE =   'activate_date';
    const RECURRENT_ENABLED =   'recurrent_enabled';
    const MONTHLY   =   'monthly';
    const SYNCED    =   'synced';
    const BITRIX_ID =   'bitrix_id';
    const REFERRAL  =   'referral';
    const IS_CANCELED   =   'is_canceled';
    const PAYMENT_TYPE  =   'payment_type';
    const END_DATE  =   'end_date';
    const START_DATE    =   'start_date';
    const PROMO_CODE    =   'promo_code';
    const ACTIVATED_BY  =   'activated_by';
    const PAYBOX_ORDER_DATE =   'paybox_order_date';
    const PAYBOX_ORDER_ID   =   'paybox_order_id';
    const IS_PAYED  =   'is_payed';
    const NUMBER    =   'number';
    const REFERRAL_CODE =   'referral_code';
    const PATRONYMIC    =   'patronymic';
    const LAST_NAME =   'last_name';
    const FIRST_NAME    =   'first_name';
    const CODE_DOES_NOT_MATCH   =   'code does not match';
    const CODE  =   'code';
    const EMAIL =   'email';
    const PHONE =   'phone';
    const VIN   =   'vin';
    const ORDER_CARD_ID =   'order_card_id';
    const CAR_NUMBER    =   'car_number';
    const VALUE =   'value';
    const C_TO  =   'c_to';
    const C_FROM    =   'c_form';
    const LEGAL_PERSON  =   'legal_person';
    const CURRENT_SYNCED    =   'current_synced';
    const YEAR  =   'year';
    const AVERAGE_PRICE =   'average_price';
    const CAR_MODEL_ID  =   'car_model_id';
    const COLORS    =   'colors';
    const IMAGE =   'image';
    const ICON  =   'icon';
    const IS_FOR_CORPORATE_USE  =   'is_for_corporate_use';
    const REFERRAL_PRICE_MONTHLY_FIRST_MONTH    =   'referral_price_monthly_first_month';
    const REFERRAL_PRICE_MONTHLY    =   'referral_price_monthly';
    const PRICE_MONTHLY_FIRST_MONTH =   'price_monthly_first_month';
    const CLIENT_DISCOUNT   =   'client_discount';
    const PRICE_MONTHLY =   'price_monthly';
    const ALLOWED_CARS  =   'allowed_cars';
    const ALLOWED_DRIVERS   =   'allowed_drivers';
    const RANK  =   'rank';
    const DETAIL_EN =   'detail_en';
    const DETAIL_KZ =   'detail_kz';
    const DETAIL    =   'detail';
    const WEBP  =   'webp';
    const JPG   =   'jpg';
    const PNG   =   'png';
    const LIMIT =   'limit';
    const CARD_ID   =   'card_id';
    const NOT_FOUND =   'not found';
    const MESSAGE   =   'message';
    const PAYMENT_ID    =   'payment_id';
    const WALLET_RECORD_ID  =   'wallet_record_id';
    const USER_ID   =   'user_id';
    const STATUS    =   'status';
    const MONEY_OPERATION_TYPE_ID   =   'money_operation_type_id';
    const INFO  =   'info';
    const SKIP  =   'skip';
    const TAKE  =   'take';
    const DATA  =   'data';
    const COUNT =   'count';
    const IS_NEGOTIABLE_PRICE   =   'is_negotiable_price';
    const IS_WITH_CHECK =   'is_with_check';
    const IS_FREE   =   'is_free';
    const CAR_CATEGORY_ID   =   'car_category_id';
    const SERVICE_ID    =   'service_id';
    const CITY_ID   =   'city_id';
    const ANNOTATION_EN =   'annotation_en';
    const ANNOTATION_KZ =   'annotation_kz';
    const ANNOTATION    =   'annotation';
    const TAGLINE_KZ    =   'tagline_kz';
    const TAGLINE_EN    =   'tagline_en';
    const TAGLINE   =   'tagline';
    const VIEW_EN   =   'view_en';
    const VIEW_KZ   =   'view_kz';
    const VIEW  =   'view';
    const ADDITIONAL_IMAGE_ID   =   'additional_image_id';
    const BROWSER_IMAGE_ID  =   'browser_image_id';
    const IS_CORPORATE  =   'is_corporate';
    const NOTE_STARS    =   'note_stars';
    const WITHOUT_CARD  =   'without_card';
    const WITH_CARD =   'with_card';
    const SELECTABLE    =   'selectable';
    const CARD_PRICE    =   'card_price';
    const URL   =   'url';
    const SERVICE_TYPE_ID   =   'service_type_id';
    const COUNTRY_ID    =   'country_id';
    const ISO_TITLE =   'iso_title';
    const LONG  =   'long';
    const LAT   =   'lat';
    const REGION_ID =   'region_id';
    const CAR_BRAND_ID  =   'car_brand_id';
    const AUTO_PART_TYPE_ID =   'auto_part_type_id';
    const AUTO_PART_PARAM_ID    =   'auto_part_param_id';
    const FILTER    =   'filter';
    const TYPE  =   'type';
    const POSITION  =   'position';
    const PARENT_ID =   'parent_id';
    const NEWS_CATEGORY_ID  =   'news_category_id';
    const DESCRIPTION_EN    =   'description_en';
    const DESCRIPTION_KZ    =   'description_kz';
    const DESCRIPTION   =   'description';
    const TITLE_EN  =   'title_en';
    const TITLE_KZ  =   'title_kz';
    const TITLE =   'title';
    const NAME_EN   =   'name_en';
    const NAME_KZ   =   'name_kz';
    const LINK  =   'link';
    const CATEGORY_NEWS_ID  =   'category_news_id';
    const IS_ACTIVE =   'is_active';
    const IMAGE_ID  =   'image_id';
    const NAME  =   'name';
    const AUTO_PART_CATEGORY_ID =   'auto_part_category_id';
    const DELETED_AT    =   'deleted_at';
    const UPDATED_AT    =   'updated_at';
    const CREATED_AT    =   'created_at';
    const UNIVERSAL =   'universal';
    const PRICE =   'price';
    const SUPPLIER_ID   =   'supplier_id';
    const CATEGORY_ID   =   'category_id';
    const ID    =   'id';
}
