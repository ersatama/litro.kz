{{-- This file is used to store sidebar items, inside the Backpack admin panel --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

<li class="nav-title">Основное</li>

<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon las la-user"></i> Пользователи</a>
    <ul class="nav-dropdown-items">
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('role') }}"><i class="nav-icon las la-user-circle"></i> Роли</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('user') }}"><i class="nav-icon las la-user"></i> Пользователи</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('user-image') }}"><i class="nav-icon las la-user-check"></i> Фотографии</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('user-profile') }}"><i class="nav-icon las la-user-friends"></i> Профили</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('user-car') }}"><i class="nav-icon las la-car-side"></i> Автовладельцы</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('driver') }}"><i class="nav-icon las la-id-card-alt"></i> Водители</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('code') }}"><i class="nav-icon las la-sms"></i> Коды подтверждения</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('message') }}"><i class="nav-icon las la-envelope-open"></i> Сообщения</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('notification-type') }}"><i class="nav-icon las la-bell"></i> Тип уведомлении</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('notification') }}"><i class="nav-icon las la-bell"></i> Уведомление</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('notification-user') }}"><i class="nav-icon las la-bell"></i> Уведомление пользователи</a></li>
    </ul>
</li>

<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon las la-globe-americas"></i> Местоположение</a>
    <ul class="nav-dropdown-items">
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('country') }}"><i class="nav-icon las la-globe-americas"></i> Страны</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('region') }}"><i class="nav-icon las la-globe-americas"></i> Регионы</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('city') }}"><i class="nav-icon las la-globe-americas"></i> Города</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('place') }}"><i class="nav-icon las la-map-marker"></i> Места</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('city-service') }}"><i class="nav-icon las la-list-alt"></i> Сервисы</a></li>
    </ul>
</li>

<li class="nav-title">Карточки</li>

<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon las la-credit-card"></i> Карты</a>
    <ul class="nav-dropdown-items">
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('card-category') }}"><i class="nav-icon las la-credit-card"></i> Категории</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('card') }}"><i class="nav-icon las la-credit-card"></i> Карточки</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('card-range') }}"><i class="nav-icon las la-credit-card"></i> Диапазон карт</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('card-service') }}"><i class="nav-icon las la-credit-card"></i> Сервисы</a></li>
    </ul>
</li>

<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon lab la-cc-mastercard"></i> Заказные</a>
    <ul class="nav-dropdown-items">
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('gift') }}"><i class="nav-icon la lab la-cc-mastercard"></i> Подарочные</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('order-card') }}"><i class="nav-icon la lab la-cc-mastercard"></i> Заказные карты</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('order-card-old') }}"><i class="nav-icon lab la-cc-mastercard"></i> Старые заказные карты</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('order-service') }}"><i class="nav-icon lab la-cc-mastercard"></i> Сервисы</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('order-service-service') }}"><i class="nav-icon lab la-cc-mastercard"></i> Сервисы заказных карт</a></li>
    </ul>
</li>

<li class="nav-title">Финансы</li>

<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon las la-comment-dollar"></i> Платежи</a>
    <ul class="nav-dropdown-items">
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('payment-system') }}"><i class="nav-icon las la-comment-dollar"></i> Платежные системы</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('payment') }}"><i class="nav-icon las la-comment-dollar"></i> Платежи</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('money-operation-type') }}"><i class="nav-icon las la-cash-register"></i> Типы денежный операции</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('money-operation') }}"><i class="nav-icon las la-cash-register"></i> Денежные операции</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('transaction') }}"><i class="nav-icon las la-file-invoice-dollar"></i> Транзакции</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('transaction-to-non-existing-user') }}"><i class="nav-icon las la-file-invoice-dollar"></i> Транзакции для гостей</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('recurrent') }}"><i class="nav-icon las la-money-bill"></i> Данные карточки</a></li>
    </ul>
</li>

<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon las la-coins"></i> Кошельки</a>
    <ul class="nav-dropdown-items">
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('currency') }}"><i class="nav-icon las la-tenge"></i> Валюта</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('wallet') }}"><i class="nav-icon las la-wallet"></i> Кошельки</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('wallet-record') }}"><i class="nav-icon las la-wallet"></i> Записи</a></li>
    </ul>
</li>

<li class="nav-title">Страхование</li>

<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon las la-car-crash"></i> Страхование</a>
    <ul class="nav-dropdown-items">
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('insurance-category') }}"><i class="nav-icon las la-car-crash"></i>  Категории</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('insurance-company') }}"><i class="nav-icon las la-car-crash"></i> Компании</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('insurance-company-product') }}"><i class="nav-icon las la-car-crash"></i> Продукты</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('insurance-company-request-log') }}"><i class="nav-icon las la-car-crash"></i> Запросы - логи</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('insurance-image') }}"><i class="nav-icon las la-car-crash"></i> Фотографии</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('insurance-kasko-policy') }}"><i class="nav-icon las la-car-crash"></i> Полис каско</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('insurance-link-refer-record') }}"><i class="nav-icon las la-car-crash"></i> Cсылки на запись</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('insurance-select') }}"><i class="nav-icon las la-car-crash"></i> Выбранные страхования</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('insurance-select-option') }}"><i class="nav-icon las la-car-crash"></i> Выбранные страхования опции</a></li>
    </ul>
</li>

<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon las la-gavel"></i> Авто-адвокаты</a>
    <ul class="nav-dropdown-items">
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('lawyer') }}"><i class="nav-icon las la-gavel"></i> Адвокаты</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('lawyer-city') }}"><i class="nav-icon las la-gavel"></i> Города</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('lawyer-contact') }}"><i class="nav-icon las la-gavel"></i> Контакты</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('lawyer-contact-access') }}"><i class="nav-icon las la-gavel"></i> Доступы</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('lawyer-service') }}"><i class="nav-icon las la-gavel"></i> Сервисы</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('lawyer-service-pivot') }}"><i class="nav-icon las la-gavel"></i> Службы</a></li>
    </ul>
</li>

<li class="nav-title">Транспорт</li>

<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon las la-car-side"></i> Автомобили</a>
    <ul class="nav-dropdown-items">
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('car-category') }}"><i class="nav-icon las la-car-alt"></i> Категории</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('car-brand') }}"><i class="nav-icon las la-car-alt"></i> Бренды</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('car-model') }}"><i class="nav-icon las la-car-alt"></i> Модели</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('car-model-average-price') }}"><i class="nav-icon las la-hand-holding-usd"></i> Средняя цена</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('car') }}"><i class="nav-icon las la-car-side"></i> Автомобили</a></li>
    </ul>
</li>

<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon las la-car-battery"></i> Автозапчасти</a>
    <ul class="nav-dropdown-items">
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('auto-part-category') }}"><i class="nav-icon las la-th-list"></i> Категории</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('auto-part-type') }}"><i class="nav-icon las la-cog"></i> Типы</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('auto-part-image') }}"><i class="nav-icon las la-camera"></i> Фотографии</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('auto-part-param') }}"><i class="nav-icon las la-cogs"></i> Параметры</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('auto-part-param-option') }}"><i class="nav-icon las la-cogs"></i> Опции</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('auto-part') }}"><i class="nav-icon las la-car-battery"></i> Автозапчасти</a></li>
    </ul>
</li>

<li class="nav-title">Сервисы</li>

<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon las la-taxi"></i> Сервисы</a>
    <ul class="nav-dropdown-items">
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('eco-service') }}"><i class="nav-icon las la-people-carry"></i> Эко сервисы</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('service') }}"><i class="nav-icon las la-people-carry"></i> Сервисы</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('service-image') }}"><i class="nav-icon las la-people-carry"></i> Фотографии</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('service-limit') }}"><i class="nav-icon las la-people-carry"></i> Лимиты</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('service-price') }}"><i class="nav-icon las la-people-carry"></i> Цены</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('service-type') }}"><i class="nav-icon las la-people-carry"></i> Типы</a></li>
    </ul>
</li>

<li class="nav-title">Партнеры</li>

<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon las la-handshake"></i> Партнеры</a>
    <ul class="nav-dropdown-items">
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('partner') }}"><i class="nav-icon las la-handshake"></i> Партнеры</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('partner-card') }}"><i class="nav-icon las la-handshake"></i> Карточки</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('partner-purchase') }}"><i class="nav-icon las la-handshake"></i> Покупки</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('third-party-app') }}"><i class="nav-icon lab la-sketch"></i> Сторонние приложения</a></li>
    </ul>
</li>

<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon las la-handshake"></i> SPartner</a>
    <ul class="nav-dropdown-items">
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('s-partner-point') }}"><i class="nav-icon las la-handshake"></i> Баллы</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('s-partner-point-category') }}"><i class="nav-icon las la-handshake"></i> Категории</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('s-partner-point-requisite') }}"><i class="nav-icon las la-handshake"></i> Реквизиты</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('s-partner-point-wallet') }}"><i class="nav-icon las la-handshake"></i> Кошельки</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('s-partner-point-wallet-record') }}"><i class="nav-icon las la-handshake"></i> Записи кошельков</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('s-partner-received-service') }}"><i class="nav-icon las la-handshake"></i> Полученные сервисы</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('s-partner-service-category') }}"><i class="nav-icon las la-handshake"></i> Категории сервисов</a></li>
    </ul>
</li>

<li class="nav-title">Медиа</li>

<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-newspaper-o"></i> Новости</a>
    <ul class="nav-dropdown-items">
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('news-category') }}"><i class="nav-icon la la-question"></i> Категории</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('news') }}"><i class="nav-icon la la-question"></i> Новости</a></li>
    </ul>
</li>

<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon las la-rss"></i> Акции</a>
    <ul class="nav-dropdown-items">
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('stock') }}"><i class="nav-icon las la-rss"></i> Акции</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('stock-image') }}"><i class="nav-icon las la-rss"></i> Фотографии</a></li>
    </ul>
</li>

<li class="nav-title">Прочее</li>

<li class="nav-item"><a class="nav-link" href="{{ backpack_url('image') }}"><i class="nav-icon las la-image"></i> Фотографии</a></li>
