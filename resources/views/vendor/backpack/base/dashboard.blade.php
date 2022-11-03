@extends(backpack_view('blank'))

@php

    use App\Domain\Repositories\User\UserRepositoryEloquent;
    use App\Domain\Repositories\Driver\DriverRepositoryEloquent;
    use App\Domain\Repositories\Card\CardRepositoryEloquent;
    use App\Domain\Repositories\CardService\CardServiceRepositoryEloquent;
    use App\Domain\Repositories\OrderCard\OrderCardRepositoryEloquent;
    use App\Domain\Repositories\Gift\GiftRepositoryEloquent;
    use App\Domain\Repositories\OrderServiceService\OrderServiceServiceRepositoryEloquent;
    use App\Domain\Repositories\Payment\PaymentRepositoryEloquent;
    use App\Domain\Repositories\MoneyOperation\MoneyOperationRepositoryEloquent;
    use App\Domain\Repositories\Wallet\WalletRepositoryEloquent;
    use App\Domain\Repositories\InsuranceCompany\InsuranceCompanyRepositoryEloquent;
    use App\Domain\Repositories\InsuranceKaskoPolicy\InsuranceKaskoPolicyRepositoryEloquent;
    use App\Domain\Repositories\Car\CarRepositoryEloquent;
    use App\Domain\Repositories\CarBrand\CarBrandRepositoryEloquent;
    use App\Domain\Repositories\CarModel\CarModelRepositoryEloquent;
    use App\Domain\Repositories\Service\ServiceRepositoryEloquent;
    use App\Domain\Repositories\ServiceLimit\ServiceLimitRepositoryEloquent;
    use App\Domain\Repositories\EcoService\EcoServiceRepositoryEloquent;
    use App\Domain\Repositories\Partner\PartnerRepositoryEloquent;
    use App\Domain\Repositories\PartnerCard\PartnerCardRepositoryEloquent;
    use App\Domain\Repositories\PartnerPurchase\PartnerPurchaseRepositoryEloquent;
    use App\Domain\Repositories\News\NewsRepositoryEloquent;
    use App\Domain\Repositories\Stock\StockRepositoryEloquent;
    use App\Domain\Repositories\Notification\NotificationRepositoryEloquent;
    use App\Domain\Repositories\NotificationUser\NotificationUserRepositoryEloquent;
    use App\Domain\Repositories\Image\ImageRepositoryEloquent;
    use App\Domain\Repositories\UserImage\UserImageRepositoryEloquent;

    $widgets['before_content'][]    =   [
    'type'    => 'div',
    'class'   => 'row',
    'content' => [
            [
                'type'          => 'progress_white',
                'class'         => 'card mb-2',
                'value'         =>  '<span class="text-primary">' . UserRepositoryEloquent::count() . '</span>',
                'description'   => 'Пользователи / ' . UserRepositoryEloquent::countActive() . ' активных',
                'progress'      => 100, // integer
                'progressClass' => 'progress-bar bg-primary',
                'hint'          => UserRepositoryEloquent::countMale() . ' муж / ' . UserRepositoryEloquent::countFemale() . ' жен',
            ],
            [
                'type'          => 'progress_white',
                'class'         => 'card mb-2',
                'value'         => '<span class="text-primary">' . DriverRepositoryEloquent::count() . '</span>',
                'description'   => 'Водители',
                'progress'      => 100, // integer
                'progressClass' => 'progress-bar bg-primary',
                'hint'          => DriverRepositoryEloquent::lastMonth() . ' записей за последний 30 дней',
            ],
            [
                'type'          => 'progress_white',
                'class'         => 'card mb-2',
                'value'         => '<span class="text-primary">' . CardRepositoryEloquent::count() . '</span>',
                'description'   => 'Карточки',
                'progress'      => 100, // integer
                'progressClass' => 'progress-bar bg-primary',
                'hint'          => CardServiceRepositoryEloquent::count() . ' сервиса',
            ],
            [
                'type'          => 'progress_white',
                'class'         => 'card mb-2',
                'value'         => '<span class="text-primary">' . OrderCardRepositoryEloquent::count() . '</span>',
                'description'   => 'Заказные карты / ' . GiftRepositoryEloquent::count() . ' подарочных / ' . OrderServiceServiceRepositoryEloquent::count() . ' сервиса',
                'progress'      => 100, // integer
                'progressClass' => 'progress-bar bg-primary',
                'hint'          => '<span class="text-success">' . OrderCardRepositoryEloquent::countActive() . ' Акт</span> • <span class="text-info"> ' . OrderCardRepositoryEloquent::countPaid() . ' Опл</span> • <span class="text-warning">' . OrderCardRepositoryEloquent::countUnpaid() . ' Не опл</span> • <span class="text-danger">' . OrderCardRepositoryEloquent::countAbort() . ' Отм</span>',
            ]
        ],
    ];

    $widgets['before_content'][]    =   [
    'type'    => 'div',
    'class'   => 'row mt-4',
    'content' => [
            [
                'type'          => 'progress_white',
                'class'         => 'card mb-2',
                'value'         =>  '<span class="text-success">' . PaymentRepositoryEloquent::count() . '</span>',
                'description'   => 'Платежи',
                'progress'      => 100, // integer
                'progressClass' => 'progress-bar bg-success',
                'hint'          => MoneyOperationRepositoryEloquent::count() . ' Денежных операции / ' . WalletRepositoryEloquent::count() . ' Кошелька',
            ],
            [
                'type'          => 'progress_white',
                'class'         => 'card mb-2',
                'value'         => '<span class="text-success">' . InsuranceCompanyRepositoryEloquent::count() . '</span>',
                'description'   => 'Страховые компании',
                'progress'      => 100, // integer
                'progressClass' => 'progress-bar bg-success',
                'hint'          => InsuranceKaskoPolicyRepositoryEloquent::count() . ' полис Каско',
            ],
            [
                'type'          => 'progress_white',
                'class'         => 'card mb-2',
                'value'         => '<span class="text-success">' . CarRepositoryEloquent::count(). '</span>',
                'description'   => 'Автомобиль',
                'progress'      => 100, // integer
                'progressClass' => 'progress-bar bg-success',
                'hint'          => CarBrandRepositoryEloquent::count() . ' марки / ' . CarModelRepositoryEloquent::count() . ' модели',
            ],
            [
                'type'          => 'progress_white',
                'class'         => 'card mb-2',
                'value'         => '<span class="text-success">' . ServiceRepositoryEloquent::count() . '</span>',
                'description'   => 'Сервисы / <span class="text-success">' . EcoServiceRepositoryEloquent::count() . ' эко сервиса</span>',
                'progress'      => 100, // integer
                'progressClass' => 'progress-bar bg-success',
                'hint' => ServiceLimitRepositoryEloquent::count().' сервис лимита',
            ]
        ],
    ];

    $widgets['before_content'][]    =   [
        'type'    => 'div',
        'class'   => 'row mt-4',
        'content' => [
            [
                'type'          => 'progress_white',
                'class'         => 'card mb-2',
                'value'         =>  '<span class="text-danger">' . PartnerRepositoryEloquent::count() . '</span>',
                'description'   => 'Партнеры',
                'progress'      => 100, // integer
                'progressClass' => 'progress-bar bg-danger',
                'hint'          => PartnerCardRepositoryEloquent::count() . ' карточек / ' . PartnerPurchaseRepositoryEloquent::count() . ' покупки',
            ],
            [
                'type'          => 'progress_white',
                'class'         => 'card mb-2',
                'value'         => '<span class="text-danger">' . NewsRepositoryEloquent::count() . '</span>',
                'description'   => 'Новости',
                'progress'      => 100, // integer
                'progressClass' => 'progress-bar bg-danger',
                'hint'          => StockRepositoryEloquent::count() . ' акции',
            ],
            [
                'type'          => 'progress_white',
                'class'         => 'card mb-2',
                'value'         => '<span class="text-danger">' . NotificationRepositoryEloquent::count() . '</span>',
                'description'   => 'Уведомлении',
                'progress'      => 100, // integer
                'progressClass' => 'progress-bar bg-danger',
                'hint'          => NotificationUserRepositoryEloquent::count() . ' персональных',
            ],
            [
                'type'          => 'progress_white',
                'class'         => 'card mb-2',
                'value'         => '<span class="text-danger">' . ImageRepositoryEloquent::count() . '</span>',
                'description'   => 'Фотографии',
                'progress'      => 100, // integer
                'progressClass' => 'progress-bar bg-danger',
                'hint' => UserImageRepositoryEloquent::count().' аватара',
            ]
        ],
    ];
@endphp

@section('content')
@endsection
