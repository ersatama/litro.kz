<?php

use Illuminate\Support\Facades\Route;

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::crud('user', 'UserCrudController');
    Route::crud('role', 'RoleCrudController');
    Route::crud('city', 'CityCrudController');
    Route::crud('auto-part-category', 'AutoPartCategoryCrudController');
    Route::crud('auto-part', 'AutoPartCrudController');
    Route::crud('auto-part-image', 'AutoPartImageCrudController');
    Route::crud('auto-part-param', 'AutoPartParamCrudController');
    Route::crud('auto-part-param-option', 'AutoPartParamOptionCrudController');
    Route::crud('auto-part-type', 'AutoPartTypeCrudController');
    Route::crud('car-brand', 'CarBrandCrudController');
    Route::crud('car-category', 'CarCategoryCrudController');
    Route::crud('car', 'CarCrudController');
    Route::crud('card-category', 'CardCategoryCrudController');
    Route::crud('card', 'CardCrudController');
    Route::crud('card-range', 'CardRangeCrudController');
    Route::crud('card-service', 'CardServiceCrudController');
    Route::crud('car-model-average-price', 'CarModelAveragePriceCrudController');
    Route::crud('car-model', 'CarModelCrudController');
    Route::crud('city-service', 'CityServiceCrudController');
    Route::crud('code', 'CodeCrudController');
    Route::crud('country', 'CountryCrudController');
    Route::crud('currency', 'CurrencyCrudController');
    Route::crud('driver', 'DriverCrudController');
    Route::crud('eco-service', 'EcoServiceCrudController');
    Route::crud('gift', 'GiftCrudController');
    Route::crud('image', 'ImageCrudController');
    Route::crud('insurance-category', 'InsuranceCategoryCrudController');
    Route::crud('insurance-company', 'InsuranceCompanyCrudController');
    Route::crud('insurance-company-product', 'InsuranceCompanyProductCrudController');
    Route::crud('insurance-company-request-log', 'InsuranceCompanyRequestLogCrudController');
    Route::crud('insurance-image', 'InsuranceImageCrudController');
    Route::crud('insurance-kasko-policy', 'InsuranceKaskoPolicyCrudController');
    Route::crud('insurance-link-refer-record', 'InsuranceLinkReferRecordCrudController');
    Route::crud('insurance-select', 'InsuranceSelectCrudController');
    Route::crud('insurance-select-option', 'InsuranceSelectOptionCrudController');
    Route::crud('lawyer', 'LawyerCrudController');
    Route::crud('lawyer-city', 'LawyerCityCrudController');
    Route::crud('lawyer-contact', 'LawyerContactCrudController');
    Route::crud('lawyer-contact-access', 'LawyerContactAccessCrudController');
    Route::crud('lawyer-service', 'LawyerServiceCrudController');
    Route::crud('lawyer-service-pivot', 'LawyerServicePivotCrudController');
    Route::crud('message', 'MessageCrudController');
    Route::crud('money-operation', 'MoneyOperationCrudController');
    Route::crud('money-operation-type', 'MoneyOperationTypeCrudController');
    Route::crud('news', 'NewsCrudController');
    Route::crud('news-category', 'NewsCategoryCrudController');
    Route::crud('order-card', 'OrderCardCrudController');
    Route::crud('order-card-old', 'OrderCardOldCrudController');
    Route::crud('order-service', 'OrderServiceCrudController');
    Route::crud('order-service-service', 'OrderServiceServiceCrudController');
    Route::crud('partner', 'PartnerCrudController');
    Route::crud('partner-card', 'PartnerCardCrudController');
    Route::crud('partner-purchase', 'PartnerPurchaseCrudController');
    Route::crud('payment', 'PaymentCrudController');
    Route::crud('payment-system', 'PaymentSystemCrudController');
    Route::crud('place', 'PlaceCrudController');
    Route::crud('recurrent', 'RecurrentCrudController');
    Route::crud('region', 'RegionCrudController');
    Route::crud('service', 'ServiceCrudController');
    Route::crud('service-image', 'ServiceImageCrudController');
    Route::crud('service-limit', 'ServiceLimitCrudController');
    Route::crud('service-price', 'ServicePriceCrudController');
    Route::crud('service-type', 'ServiceTypeCrudController');
    Route::crud('s-partner-point', 'SPartnerPointCrudController');
    Route::crud('s-partner-point-category', 'SPartnerPointCategoryCrudController');
    Route::crud('s-partner-point-requisite', 'SPartnerPointRequisiteCrudController');
    Route::crud('s-partner-point-wallet', 'SPartnerPointWalletCrudController');
    Route::crud('s-partner-point-wallet-record', 'SPartnerPointWalletRecordCrudController');
    Route::crud('s-partner-received-service', 'SPartnerReceivedServiceCrudController');
    Route::crud('s-partner-service-category', 'SPartnerServiceCategoryCrudController');
    Route::crud('stock', 'StockCrudController');
    Route::crud('stock-image', 'StockImageCrudController');
    Route::crud('third-party-app', 'ThirdPartyAppCrudController');
    Route::crud('transaction', 'TransactionCrudController');
    Route::crud('transaction-to-non-existing-user', 'TransactionToNonExistingUserCrudController');
    Route::crud('user-car', 'UserCarCrudController');
    Route::crud('user-image', 'UserImageCrudController');
    Route::crud('user-profile', 'UserProfileCrudController');
    Route::crud('wallet', 'WalletCrudController');
    Route::crud('wallet-record', 'WalletRecordCrudController');
}); // this should be the absolute last line of this file