<?php

namespace App\Domain\Contracts;

abstract class Contract
{
    const INPUT =   'input';
    const KZ    =   'kz';
    const RU    =   'ru';
    const EN    =   'en';
    const USER_CARS =   'user_cars';
    const USER_CAR  =   'user_car';
    const USER_PROFILES =   'user_profiles';
    const USER_PROFILE  =   'user_profile';
    const USER_IMAGES   =   'user_images';
    const USER_IMAGE    =   'user_image';
    const REQUIRED  =   'required';
    const NO    =   'no';
    const YES   =   'yes';
    const CONTRACT  =   'contract';
    const SUCCESS   =   'success';
    const PSW   =   'psw';
    const LOGIN =   'login';
    const MES   =   'mes';
    const PHONES    =   'phones';
    const ALLOWED_CHOOSEABLE_SERVICES   =   'allowed_chooseable_services';
    const AUTO_PART_ID  =   'auto_part_id';
    const STOCK_ID  =   'stock_id';
    const PURCHASE_DATE =   'purchase_date';
    const PURCHASE_ID   =   'purchase_id';
    const PARTNER_ID    =   'partner_id';
    const ORDER_SERVICE_ID  =   'order_service_id';
    const CAR_CATEGORY  =   'car_category';
    const ORDER_CARD    =   'order_card';
    const CAR_MODEL =   'car_model';
    const AUTO_PART_TYPE    =   'auto_part_type';
    const AUTO_PART_CATEGORY    =   'auto_part_category';
    const WALLET    =   'wallet';
    const PAYMENT   =   'payment';
    const S_PARTNER_RECEIVED_SERVICE    =   's_partner_received_service';
    const S_PARTNER_POINT_WALLET    =   's_partner_point_wallet';
    const CURRENCY  =   'currency';
    const S_PARTNER_SERVICE_CATEGORY    =   's_partner_service_category';
    const S_PARTNER_POINT   =   's_partner_point';
    const LAWYER_SERVICE    =   'lawyer_service';
    const CITY  =   'city';
    const CARD  =   'card';
    const ROLE  =   'role';
    const ROLES =   'roles';
    const BITRIX    =   'bitrix';
    const PARTNER   =   'partner';
    const PLACE =   'place';
    const SERVICE   =   'service';
    const LAWYER    =   'lawyer';
    const USER  =   'user';
    const PARAMETERS    =   'parameters';
    const USERS =   'users';
    const INSURANCE_COMPANY =   'insurance_company';
    const INSURANCE_CATEGORY    =   'insurance_category';
    const PUBLIC    =   'public';
    const WITH_DELETED  =   'with_deleted';
    const ORDER_BY_TYPE =   'order_by_type';
    const ORDER_BY  =   'order_by';
    const CAR_BRAND =   'car_brand';
    const BANK  =   'bank';
    const BIK   =   'bik';
    const IIK   =   'iik';
    const BIN   =   'bin';
    const SUM_FROM_BANK_CARD    =   'sum_from_bank_card';
    const SUM_FROM_WALLET   =   'sum_from_wallet';
    const S_PARTNER_POINT_WALLET_ID =   's_partner_point_wallet_id';
    const S_PARTNER_RECEIVED_SERVICE_ID =   's_partner_received_service_id';
    const S_PARTNER_SERVICE_CATEGORY_ID =   's_partner_service_category_id';
    const S_PARTNER_POINT_ID    =   's_partner_point_id';
    const DISCOUNT  =   'discount';
    const ADS_AND_SELL  =   'ads_and_sell';
    const SELL_CARD =   'sell_card';
    const MANAGER_NAME  =   'manager_name';
    const LEGAL_TITLE   =   'legal_title';
    const LAWYER_SERVICE_ID =   'lawyer_service_id';
    const LAWYER_ID =   'lawyer_id';
    const INSURANCE_SELECT_ID   =   'insurance_select_id';
    const EXTENSION =   'extension';
    const POLICY_ID =   'policy_id';
    const BONUS_MALUS   =   'bonus_malus';
    const REGION    =   'region';
    const INSURANCE_PRICE   =   'insurance_price';
    const PRODUCTS  =   'products';
    const POLICY_BODY   =   'policy_body';
    const ERROR_MSG =   'error_msg';
    const USER_CAR_ID   =   'user_car_id';
    const REQUEST_BODY  =   'request_body';
    const RESPONSE_BODY =   'response_body';
    const RESPONSE_STATUS   =   'response_status';
    const REQUEST_URL   =   'request_url';
    const ACTION_TYPE   =   'action_type';
    const INSURANCE_COMPANY_REQUEST_TYPE    =   'insurance_company_request_type';
    const INSURANCE_COMPANY_ID  =   'insurance_company_id';
    const INSURANCE_CATEGORY_ID =   'insurance_category_id';
    const API_TOKEN =   'api_token';
    const KASKO_LINK    =   'kasko_link';
    const ADDITIONAL_INSURANCE_BONUS    =   'additional_insurance_bonus';
    const REQUIRED_INSURANCE_BONUS  =   'required_insurance_bonus';
    const PROVIDES_ADDITIONAL_INSURANCE =   'provides_additional_insurance';
    const PROVIDES_REQUIRED_INSURANCE   =   'provides_required_insurance';
    const BONUS_PERCENT =   'bonus_percent';
    const SITE  =   'site';
    const OGPO_LINK =   'opgo_link';
    const PREVIOUS_BALANCE  =   'previous_balance';
    const WALLET_ID =   'wallet_id';
    const INCORRECT_PHONE_OR_PASSWORD   =   'incorrect_phone_or_password';
    const FEMALE    =   'female';
    const MALE  =   'male';
    const BONUS =   'bonus';
    const VLIFE_USER_ID =   'vlife_user_id';
    const IS_VLIFE_USER =   'is_vlife_user';
    const GENDER    =   'gender';
    const IIN   =   'iin';
    const ROLE_ID   =   'role_id';
    const IS_BLOCKED    =   'is_blocked';
    const BIRTHDATE =   'birthdate';
    const DATE  =   'date';
    const REGISTRATION_CERTIFICATE  =   'registration_certificate';
    const COMMENT   =   'comment';
    const DELTA_BALANCE =   'delta_balance';
    const BALANCE   =   'balance';
    const USER_TO   =   'user_to';
    const USER_FROM =   'user_from';
    const PASSWORD  =   'password';
    const HASHED    =   'hashed';
    const KEY   =   'key';
    const CATEGORY  =   'category';
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
    const IS_PAID   =   'is_paid';
    const NUMBER    =   'number';
    const SELECT_FROM_ARRAY =   'select_from_array';
    const REFERRAL_CODE =   'referral_code';
    const PATRONYMIC    =   'patronymic';
    const LAST_NAME =   'last_name';
    const FIRST_NAME    =   'first_name';
    const MIDDLE_NAME   =   'middle_name';
    const LOCALE    =   'locale';
    const CODE_DOES_NOT_MATCH   =   'code does not match';
    const CODE  =   'code';
    const EMAIL =   'email';
    const PHONE =   'phone';
    const TEXT  =   'text';
    const FULLNAME  =   'fullname';
    const VIN   =   'vin';
    const ORDER_CARD_ID =   'order_card_id';
    const ORDER_CARD_ID_OLD =   'order_card_id_old';
    const CAR_NUMBER    =   'car_number';
    const VALUE =   'value';
    const RELATION  =   'relation';
    const IS_CHOOSEABLE =   'is_chooseable';
    const C_TO  =   'c_to';
    const C_FROM    =   'c_from';
    const LEGAL_PERSON  =   'legal_person';
    const CURRENT_SYNCED    =   'current_synced';
    const YEAR  =   'year';
    const AVERAGE_PRICE =   'average_price';
    const _AVERAGE_PRICE    =   'averagePrice';
    const CAR_MODEL_ID  =   'car_model_id';
    const COLORS    =   'colors';
    const IMAGE =   'image';
    const SELECT    =   'select';
    const IMAGES    =   'images';
    const BROWSER_IMAGE =   'browser_image';
    const ADDITIONAL_IMAGE  =   'additional_image';
    const NEWS_CATEGORY =   'news_category';
    const _IMG  =   '_img';
    const _ICON =   '_icon';
    const _ICON_SELECTED    =   '_icon_selected';
    const CARD_CATEGORY =   'card_category';
    const ICON  =   'icon';
    const ICON_SELECTED =   'icon_selected';
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
    const NOTIFICATION_ID   =   'notification_id';
    const STATUS    =   'status';
    const MONEY_OPERATION_TYPE_ID   =   'money_operation_type_id';
    const INFO  =   'info';
    const SKIP  =   'skip';
    const TAKE  =   'take';
    const DATA  =   'data';
    const APP_ID    =   'app_id';
    const TAGS  =   'tags';
    const IS_ANDROID    =   'isAndroid';
    const IS_IOS    =   'isIos';
    const IS_ANY_WEB    =   'isAnyWeb';
    const ANDROID_SOUND =   'android_sound';
    const IOS_SOUND =   'ios_sound';
    const CONTENTS  =   'contents';
    const HEADINGS  =   'headings';
    const IOS_BADGE_TYPE    =   'ios_badgeType';
    const IOS_BADGE_COUNT   =   'ios_badgeCount';
    const BIG_PICTURE   =   'big_picture';
    const IOS_ATTACHMENTS   =   'ios_attachments';
    const INCREASE  =   'Increase';
    const COUNT =   'count';
    const IS_NEGOTIABLE_PRICE   =   'is_negotiable_price';
    const IS_WITH_CHECK =   'is_with_check';
    const IS_FREE   =   'is_free';
    const CAR_CATEGORY_ID   =   'car_category_id';
    const SERVICE_ID    =   'service_id';
    const CITY_ID   =   'city_id';
    const NOTIFICATION_TYPE_ID  =   'notification_type_id';
    const ANNOTATION_EN =   'annotation_en';
    const ANNOTATION_KZ =   'annotation_kz';
    const ANNOTATION    =   'annotation';
    const TAGLINE_KZ    =   'tagline_kz';
    const TAGLINE_EN    =   'tagline_en';
    const TAGLINE   =   'tagline';
    const VIEW_EN   =   'view_en';
    const VIEW_KZ   =   'view_kz';
    const VIEW  =   'view';
    const VIEWS =   'views';
    const ADDITIONAL_IMAGE_ID   =   'additional_image_id';
    const BROWSER_IMAGE_ID  =   'browser_image_id';
    const IS_CORPORATE  =   'is_corporate';
    const NOTE_STARS    =   'note_stars';
    const WITHOUT_CARD  =   'without_card';
    const WITH_CARD =   'with_card';
    const SELECTABLE    =   'selectable';
    const CARD_PRICE    =   'card_price';
    const URL   =   'url';
    const MONEY_OPERATION_TYPE  =   'money_operation_type';
    const WALLET_RECORD =   'wallet_record';
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
    const ADDITIONAL    =   'additional';
    const TYPE_ID   =   'type_id';
    const SOUND =   'sound';
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
    const IMG   =   'img';
    const NAME  =   'name';
    const FILTER_NAME   =   'filter_name';
    const AUTO_PART_CATEGORY_ID =   'auto_part_category_id';
    const ORDER_SERVICE =   'order_service';
    const DELETED_AT    =   'deleted_at';
    const UPDATED_AT    =   'updated_at';
    const SERVICE_TYPE  =   'service_type';
    const PAYMENT_SYSTEM    =   'payment_system';
    const CREATED_AT    =   'created_at';
    const UNIVERSAL =   'universal';
    const COUNTRY   =   'country';
    const PRICE =   'price';
    const SUPPLIER_ID   =   'supplier_id';
    const CATEGORY_ID   =   'category_id';
    const CARD_CATEGORY_ID  =   'card_category_id';
    const ID    =   'id';
    const ASC   =   'asc';
    const DESC  =   'desc';
    const DRIVER    =   'driver';
    const NOT_VIEWED    =   'not_viewed';
    const ORDER_BY_TYPES    =   [
        self::ASC,
        self::DESC
    ];
    const REMOVABLE =   [
        self::IMAGE_ID,
        self::CURRENCY_ID,
        self::PASSWORD,
        self::AUTO_PART_TYPE_ID,
        self::CARD_ID,
        self::MONEY_OPERATION_TYPE_ID,
        self::WALLET_RECORD_ID,
        self::USER_ID,
        self::WALLET_ID,
        self::CITY_ID,
        self::PAYMENT_ID,
        self::NEWS_CATEGORY_ID,
        self::CARD_CATEGORY_ID,
        self::ORDER_SERVICE_ID,
        self::PARTNER_ID,
        self::PAYMENT_SYSTEM_ID,
        self::BROWSER_IMAGE_ID,
        self::ADDITIONAL_IMAGE_ID,
        self::COUNTRY_ID,
    ];

    public static function CLEAR(array $arr) :array
    {
        foreach (self::REMOVABLE as &$value) {
            unset($arr[$value]);
        }
        foreach ($arr as $key => $val) {
            if (is_null($val)) {
                unset($arr[$key]);
            }
        }
        return $arr;
    }
    public static function T($key): string
    {
        return __(self::CONTRACT.'.'.$key);
    }
}
