<?php

use Illuminate\Support\Facades\Facade;

return [

    /*
    |--------------------------------------------------------------------------
    | Application Name
    |--------------------------------------------------------------------------
    |
    | This value is the name of your application. This value is used when the
    | framework needs to place the application's name in a notification or
    | any other location as required by the application or its packages.
    |
    */

    'name' => env('APP_NAME', 'Laravel'),

    /*
    |--------------------------------------------------------------------------
    | Application Environment
    |--------------------------------------------------------------------------
    |
    | This value determines the "environment" your application is currently
    | running in. This may determine how you prefer to configure various
    | services the application utilizes. Set this in your ".env" file.
    |
    */

    'env' => env('APP_ENV', 'production'),

    /*
    |--------------------------------------------------------------------------
    | Application Debug Mode
    |--------------------------------------------------------------------------
    |
    | When your application is in debug mode, detailed error messages with
    | stack traces will be shown on every error that occurs within your
    | application. If disabled, a simple generic error page is shown.
    |
    */

    'debug' => (bool) env('APP_DEBUG', false),

    /*
    |--------------------------------------------------------------------------
    | Application URL
    |--------------------------------------------------------------------------
    |
    | This URL is used by the console to properly generate URLs when using
    | the Artisan command line tool. You should set this to the root of
    | your application so that it is used when running Artisan tasks.
    |
    */

    'url' => env('APP_URL', 'http://localhost'),

    'asset_url' => env('ASSET_URL'),

    /*
    |--------------------------------------------------------------------------
    | Application Timezone
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default timezone for your application, which
    | will be used by the PHP date and date-time functions. We have gone
    | ahead and set this to a sensible default for you out of the box.
    |
    */

    'timezone' => 'UTC',

    /*
    |--------------------------------------------------------------------------
    | Application Locale Configuration
    |--------------------------------------------------------------------------
    |
    | The application locale determines the default locale that will be used
    | by the translation service provider. You are free to set this value
    | to any of the locales which will be supported by the application.
    |
    */

    'locale' => 'ru',

    /*
    |--------------------------------------------------------------------------
    | Application Fallback Locale
    |--------------------------------------------------------------------------
    |
    | The fallback locale determines the locale to use when the current one
    | is not available. You may change the value to correspond to any of
    | the language folders that are provided through your application.
    |
    */

    'fallback_locale' => 'ru',

    /*
    |--------------------------------------------------------------------------
    | Faker Locale
    |--------------------------------------------------------------------------
    |
    | This locale will be used by the Faker PHP library when generating fake
    | data for your database seeds. For example, this will be used to get
    | localized telephone numbers, street address information and more.
    |
    */

    'faker_locale' => 'en_US',

    /*
    |--------------------------------------------------------------------------
    | Encryption Key
    |--------------------------------------------------------------------------
    |
    | This key is used by the Illuminate encrypter service and should be set
    | to a random, 32 character string, otherwise these encrypted strings
    | will not be safe. Please do this before deploying an application!
    |
    */

    'key' => env('APP_KEY'),

    'cipher' => 'AES-256-CBC',

    /*
    |--------------------------------------------------------------------------
    | Maintenance Mode Driver
    |--------------------------------------------------------------------------
    |
    | These configuration options determine the driver used to determine and
    | manage Laravel's "maintenance mode" status. The "cache" driver will
    | allow maintenance mode to be controlled across multiple machines.
    |
    | Supported drivers: "file", "cache"
    |
    */

    'maintenance' => [
        'driver' => 'file',
        // 'store'  => 'redis',
    ],

    /*
    |--------------------------------------------------------------------------
    | Autoloaded Service Providers
    |--------------------------------------------------------------------------
    |
    | The service providers listed here will be automatically loaded on the
    | request to your application. Feel free to add your own services to
    | this array to grant expanded functionality to your applications.
    |
    */

    'providers' => [

        /*
         * Laravel Framework Service Providers...
         */
        Illuminate\Auth\AuthServiceProvider::class,
        Illuminate\Broadcasting\BroadcastServiceProvider::class,
        Illuminate\Bus\BusServiceProvider::class,
        Illuminate\Cache\CacheServiceProvider::class,
        Illuminate\Foundation\Providers\ConsoleSupportServiceProvider::class,
        Illuminate\Cookie\CookieServiceProvider::class,
        Illuminate\Database\DatabaseServiceProvider::class,
        Illuminate\Encryption\EncryptionServiceProvider::class,
        Illuminate\Filesystem\FilesystemServiceProvider::class,
        Illuminate\Foundation\Providers\FoundationServiceProvider::class,
        Illuminate\Hashing\HashServiceProvider::class,
        Illuminate\Mail\MailServiceProvider::class,
        Illuminate\Notifications\NotificationServiceProvider::class,
        Illuminate\Pagination\PaginationServiceProvider::class,
        Illuminate\Pipeline\PipelineServiceProvider::class,
        Illuminate\Queue\QueueServiceProvider::class,
        Illuminate\Redis\RedisServiceProvider::class,
        Illuminate\Auth\Passwords\PasswordResetServiceProvider::class,
        Illuminate\Session\SessionServiceProvider::class,
        Illuminate\Translation\TranslationServiceProvider::class,
        Illuminate\Validation\ValidationServiceProvider::class,
        Illuminate\View\ViewServiceProvider::class,

        /*
         * Package Service Providers...
         */
        Maatwebsite\Excel\ExcelServiceProvider::class,
        /*
         * Application Service Providers...
         */
        App\Providers\AppServiceProvider::class,
        App\Providers\AuthServiceProvider::class,
        // App\Providers\BroadcastServiceProvider::class,
        App\Providers\EventServiceProvider::class,
        App\Providers\RouteServiceProvider::class,

        App\Providers\Repositories\NewsCategoryRepositoryProvider::class,
        App\Providers\Repositories\NewsRepositoryProvider::class,
        App\Providers\Repositories\AutoPartCategoryRepositoryProvider::class,
        App\Providers\Repositories\AutoPartParamRepositoryProvider::class,
        App\Providers\Repositories\AutoPartParamOptionRepositoryProvider::class,
        App\Providers\Repositories\AutoPartTypeRepositoryProvider::class,
        App\Providers\Repositories\CarCategoryRepositoryProvider::class,
        App\Providers\Repositories\CarBrandRepositoryProvider::class,
        App\Providers\Repositories\CarModelRepositoryProvider::class,
        App\Providers\Repositories\CityRepositoryProvider::class,
        App\Providers\Repositories\CurrencyRepositoryProvider::class,
        App\Providers\Repositories\CountryRepositoryProvider::class,
        App\Providers\Repositories\RegionRepositoryProvider::class,
        App\Providers\Repositories\CardCategoryRepositoryProvider::class,
        App\Providers\Repositories\ServiceRepositoryProvider::class,
        App\Providers\Repositories\ServiceTypeRepositoryProvider::class,
        App\Providers\Repositories\ServicePriceRepositoryProvider::class,
        App\Providers\Repositories\MoneyOperationRepositoryProvider::class,
        App\Providers\Repositories\MoneyOperationTypeRepositoryProvider::class,
        App\Providers\Repositories\ServiceLimitRepositoryProvider::class,
        App\Providers\Repositories\AutoPartRepositoryProvider::class,
        App\Providers\Repositories\ImageRepositoryProvider::class,
        App\Providers\Repositories\CardRepositoryProvider::class,
        App\Providers\Repositories\CarModelAveragePriceRepositoryProvider::class,
        App\Providers\Repositories\CardRangeRepositoryProvider::class,
        App\Providers\Repositories\CardServiceRepositoryProvider::class,
        App\Providers\Repositories\CarRepositoryProvider::class,
        App\Providers\Repositories\CityServiceRepositoryProvider::class,
        App\Providers\Repositories\CodeRepositoryProvider::class,
        App\Providers\Repositories\DriverRepositoryProvider::class,
        App\Providers\Repositories\EcoServiceRepositoryProvider::class,
        App\Providers\Repositories\GiftRepositoryProvider::class,
        App\Providers\Repositories\OrderCardRepositoryProvider::class,
        App\Providers\Repositories\OrderServiceRepositoryProvider::class,
        App\Providers\Repositories\PartnerRepositoryProvider::class,
        App\Providers\Repositories\PaymentRepositoryProvider::class,
        App\Providers\Repositories\PaymentSystemRepositoryProvider::class,
        App\Providers\Repositories\PlaceRepositoryProvider::class,
        App\Providers\Repositories\RecurrentRepositoryProvider::class,
        App\Providers\Repositories\StockRepositoryProvider::class,
        App\Providers\Repositories\ThirdPartyAppRepositoryProvider::class,
        App\Providers\Repositories\TransactionRepositoryProvider::class,
        App\Providers\Repositories\TransactionToNonExistingUserRepositoryProvider::class,
        App\Providers\Repositories\UserCarRepositoryProvider::class,
        App\Providers\Repositories\UserRepositoryProvider::class,
        App\Providers\Repositories\WalletRepositoryProvider::class,
        App\Providers\Repositories\WalletRecordRepositoryProvider::class,
        App\Providers\Repositories\InsuranceCompanyRepositoryProvider::class,
        App\Providers\Repositories\InsuranceCategoryRepositoryProvider::class,
        App\Providers\Repositories\InsuranceCompanyProductProvider::class,
        App\Providers\Repositories\InsuranceCompanyRequestLogRepositoryProvider::class,
        App\Providers\Repositories\InsuranceKaskoPolicyRepositoryProvider::class,
        App\Providers\Repositories\InsuranceLinkReferRecordRepositoryProvider::class,
        App\Providers\Repositories\InsuranceImageRepositoryProvider::class,
        App\Providers\Repositories\InsuranceSelectRepositoryProvider::class,
        App\Providers\Repositories\InsuranceSelectOptionRepositoryProvider::class,
        App\Providers\Repositories\LawyerRepositoryProvider::class,
        App\Providers\Repositories\LawyerCityRepositoryProvider::class,
        App\Providers\Repositories\LawyerServiceRepositoryProvider::class,
        App\Providers\Repositories\LawyerServicePivotRepositoryProvider::class,
        App\Providers\Repositories\LawyerContactRepositoryProvider::class,
        App\Providers\Repositories\LawyerContactAccessRepositoryProvider::class,
        App\Providers\Repositories\SPartnerPointRepositoryProvider::class,
        App\Providers\Repositories\SPartnerServiceCategoryRepositoryProvider::class,
        App\Providers\Repositories\SPartnerPointCategoryRepositoryProvider::class,
        App\Providers\Repositories\SPartnerPointWalletRepositoryProvider::class,
        App\Providers\Repositories\SPartnerPointWalletRecordRepositoryProvider::class,
        App\Providers\Repositories\SPartnerReceivedServiceRepositoryProvider::class,
        App\Providers\Repositories\SPartnerPointRequisiteRepositoryProvider::class,
        App\Providers\Repositories\OrderServiceServiceRepositoryProvider::class,
        App\Providers\Repositories\PartnerCardRepositoryProvider::class,
        App\Providers\Repositories\PartnerPurchaseRepositoryProvider::class,
        App\Providers\Repositories\OrderCardOldRepositoryProvider::class,
        App\Providers\Repositories\MessageRepositoryProvider::class,
        App\Providers\Repositories\UserImageRepositoryProvider::class,
        App\Providers\Repositories\StockImageRepositoryProvider::class,
        App\Providers\Repositories\ServiceImageRepositoryProvider::class,
        App\Providers\Repositories\AutoPartImageRepositoryProvider::class,
        App\Providers\Repositories\RoleRepositoryProvider::class,
        App\Providers\Repositories\UserProfileRepositoryProvider::class,
        App\Providers\Repositories\NotificationUserRepositoryProvider::class,
        App\Providers\Repositories\NotificationRepositoryProvider::class,
        App\Providers\Repositories\NotificationCountRepositoryProvider::class,
        App\Providers\Repositories\NotificationTypeRepositoryProvider::class,
        App\Providers\Repositories\OrderCardChosenServiceRepositoryProvider::class,
        App\Providers\Repositories\RepeatedPartnerGiftCardRepositoryProvider::class,
        App\Providers\Repositories\EcoServiceImageRepositoryProvider::class,

    ],

    /*
    |--------------------------------------------------------------------------
    | Class Aliases
    |--------------------------------------------------------------------------
    |
    | This array of class aliases will be registered when this application
    | is started. However, feel free to register as many as you wish as
    | the aliases are "lazy" loaded so they don't hinder performance.
    |
    */

    'aliases' => Facade::defaultAliases()->merge([
        // 'ExampleClass' => App\Example\ExampleClass::class,
        'OneSignal' => \Ladumor\OneSignal\OneSignal::class,
        'ExcelOrderCard' => Maatwebsite\Excel\Facades\Excel::class,
    ])->toArray(),

];
