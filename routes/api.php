<?php

use App\Http\Controllers\Api\AutoPartCategoryController;
use App\Http\Controllers\Api\AutoPartController;
use App\Http\Controllers\Api\AutoPartImageController;
use App\Http\Controllers\Api\AutoPartParamController;
use App\Http\Controllers\Api\AutoPartParamOptionController;
use App\Http\Controllers\Api\AutoPartTypeController;
use App\Http\Controllers\Api\CarBrandController;
use App\Http\Controllers\Api\CarCategoryController;
use App\Http\Controllers\Api\CarController;
use App\Http\Controllers\Api\CardCategoryController;
use App\Http\Controllers\Api\CardController;
use App\Http\Controllers\Api\CardRangeController;
use App\Http\Controllers\Api\CardServiceController;
use App\Http\Controllers\Api\CarModelAveragePriceController;
use App\Http\Controllers\Api\CarModelController;
use App\Http\Controllers\Api\CityController;
use App\Http\Controllers\Api\CityServiceController;
use App\Http\Controllers\Api\CodeController;
use App\Http\Controllers\Api\CountryController;
use App\Http\Controllers\Api\CurrencyController;
use App\Http\Controllers\Api\DriverController;
use App\Http\Controllers\Api\EcoServiceController;
use App\Http\Controllers\Api\GiftController;
use App\Http\Controllers\Api\ImageController;
use App\Http\Controllers\Api\InsuranceCategoryController;
use App\Http\Controllers\Api\InsuranceCompanyController;
use App\Http\Controllers\Api\InsuranceCompanyProductController;
use App\Http\Controllers\Api\InsuranceCompanyRequestLogController;
use App\Http\Controllers\Api\InsuranceImageController;
use App\Http\Controllers\Api\InsuranceKaskoPolicyController;
use App\Http\Controllers\Api\InsuranceLinkReferRecordController;
use App\Http\Controllers\Api\InsuranceSelectController;
use App\Http\Controllers\Api\InsuranceSelectOptionController;
use App\Http\Controllers\Api\LawyerCityController;
use App\Http\Controllers\Api\LawyerContactAccessController;
use App\Http\Controllers\Api\LawyerContactController;
use App\Http\Controllers\Api\LawyerController;
use App\Http\Controllers\Api\LawyerServiceController;
use App\Http\Controllers\Api\LawyerServicePivotController;
use App\Http\Controllers\Api\MessageController;
use App\Http\Controllers\Api\MoneyOperationController;
use App\Http\Controllers\Api\MoneyOperationTypeController;
use App\Http\Controllers\Api\NewsCategoryController;
use App\Http\Controllers\Api\NewsController;
use App\Http\Controllers\Api\OrderCardController;
use App\Http\Controllers\Api\OrderCardOldController;
use App\Http\Controllers\Api\OrderServiceController;
use App\Http\Controllers\Api\OrderServiceServiceController;
use App\Http\Controllers\Api\PartnerCardController;
use App\Http\Controllers\Api\PartnerController;
use App\Http\Controllers\Api\PartnerPurchaseController;
use App\Http\Controllers\Api\PaymentController;
use App\Http\Controllers\Api\PaymentSystemController;
use App\Http\Controllers\Api\PlaceController;
use App\Http\Controllers\Api\RecurrentController;
use App\Http\Controllers\Api\RegionController;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\ServiceImageController;
use App\Http\Controllers\Api\ServiceLimitController;
use App\Http\Controllers\Api\ServicePriceController;
use App\Http\Controllers\Api\ServiceTypeController;
use App\Http\Controllers\Api\SPartnerPointCategoryController;
use App\Http\Controllers\Api\SPartnerPointController;
use App\Http\Controllers\Api\SPartnerPointRequisiteController;
use App\Http\Controllers\Api\SPartnerPointWalletController;
use App\Http\Controllers\Api\SPartnerPointWalletRecordController;
use App\Http\Controllers\Api\SPartnerReceivedServiceController;
use App\Http\Controllers\Api\SPartnerServiceCategoryController;
use App\Http\Controllers\Api\StockController;
use App\Http\Controllers\Api\StockImageController;
use App\Http\Controllers\Api\ThirdPartyAppController;
use App\Http\Controllers\Api\TransactionController;
use App\Http\Controllers\Api\TransactionToNonExistingUserController;
use App\Http\Controllers\Api\UserCarController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\UserImageController;
use App\Http\Controllers\Api\WalletController;
use App\Http\Controllers\Api\WalletRecordController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE');
header('Access-Control-Allow-Headers: Content-Type, X-Auth-Token, Origin, Authorization,X-localization,X-No-Cache');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(SPartnerPointRequisiteController::class)->group(function() {
    Route::prefix('sPartnerPointRequisite')->group(function() {
        Route::get('get/{skip}/{take}','get')->name('sPartnerPointRequisite.get');
        Route::get('getBySPartnerPointId/{sPartnerPointId}/{skip}/{take}','getBySPartnerPointId')->name('sPartnerPointRequisite.getBySPartnerPointId');
        Route::get('getById/{id}','getById')->name('sPartnerPointRequisite.getById');
    });
});

Route::controller(SPartnerReceivedServiceController::class)->group(function() {
    Route::prefix('sPartnerReceivedService')->group(function() {
        Route::get('get/{skip}/{take}','get')->name('sPartnerReceivedService.get');
        Route::get('getByUserId/{userId}/{skip}/{take}','getByUserId')->name('insuranceImage.getByUserId');
        Route::get('getById/{id}','getById')->name('sPartnerReceivedService.getById');
    });
});

Route::controller(SPartnerPointWalletRecordController::class)->group(function() {
    Route::prefix('sPartnerPointWalletRecord')->group(function() {
        Route::get('get/{skip}/{take}','get')->name('sPartnerPointWalletRecord.get');
        Route::get('getBySPartnerPointWalletId/{sPartnerPointWalletId}/{skip}/{take}','getBySPartnerPointWalletId')->name('sPartnerPointWalletRecord.getBySPartnerPointWalletId');
        Route::get('getById/{id}','getById')->name('sPartnerPointWalletRecord.getById');
    });
});

Route::controller(SPartnerPointWalletController::class)->group(function() {
    Route::prefix('sPartnerPointWallet')->group(function() {
        Route::get('get/{skip}/{take}','get')->name('sPartnerPointWallet.get');
        Route::get('getBySPartnerPointId/{sPartnerPointId}/{skip}/{take}','getBySPartnerPointId')->name('sPartnerPointWallet.getBySPartnerPointId');
        Route::get('getById/{id}','getById')->name('sPartnerPointWallet.getById');
    });
});

Route::controller(SPartnerPointCategoryController::class)->group(function() {
    Route::prefix('sPartnerPointCategory')->group(function() {
        Route::get('get/{skip}/{take}','get')->name('sPartnerPointCategory.get');
        Route::get('getBySPartnerPointId/{sPartnerPointId}/{skip}/{take}','getBySPartnerPointId')->name('sPartnerPointCategory.getBySPartnerPointId');
        Route::get('getById/{id}','getById')->name('sPartnerPointCategory.getById');
    });
});

Route::controller(SPartnerServiceCategoryController::class)->group(function() {
    Route::prefix('sPartnerServiceCategory')->group(function() {
        Route::get('get/{skip}/{take}','get')->name('sPartnerServiceCategory.get');
        Route::get('getById/{id}','getById')->name('sPartnerServiceCategory.getById');
    });
});

Route::controller(SPartnerPointController::class)->group(function() {
    Route::prefix('sPartnerPoint')->group(function() {
        Route::get('get/{skip}/{take}','get')->name('sPartnerPoint.get');
        Route::get('getById/{id}','getById')->name('sPartnerPoint.getById');
    });
});

Route::controller(LawyerContactAccessController::class)->group(function() {
    Route::prefix('lawyerContactAccess')->group(function() {
        Route::get('get/{skip}/{take}','get')->name('lawyerContactAccess.get');
        Route::get('getByLawyerId/{lawyerId}/{skip}/{take}','getByLawyerId')->name('lawyerContactAccess.getByLawyerId');
        Route::get('getById/{id}','getById')->name('lawyerContactAccess.getById');
    });
});

Route::controller(LawyerContactController::class)->group(function() {
    Route::prefix('lawyerContact')->group(function() {
        Route::get('get/{skip}/{take}','get')->name('lawyerContact.get');
        Route::get('getByLawyerId/{lawyerId}/{skip}/{take}','getByLawyerId')->name('lawyerContact.getByLawyerId');
        Route::get('getById/{id}','getById')->name('lawyerContact.getById');
    });
});

Route::controller(LawyerServicePivotController::class)->group(function() {
    Route::prefix('lawyerServicePivot')->group(function() {
        Route::get('get/{skip}/{take}','get')->name('lawyerServicePivot.get');
        Route::get('getByLawyerId/{lawyerId}/{skip}/{take}','getByLawyerId')->name('lawyerServicePivot.getByLawyerId');
        Route::get('getById/{id}','getById')->name('lawyerServicePivot.getById');
    });
});

Route::controller(LawyerServiceController::class)->group(function() {
    Route::prefix('lawyerService')->group(function() {
        Route::get('get/{skip}/{take}','get')->name('lawyerService.get');
        Route::get('getById/{id}','getById')->name('lawyerService.getById');
    });
});

Route::controller(LawyerCityController::class)->group(function() {
    Route::prefix('lawyerCity')->group(function() {
        Route::get('get/{skip}/{take}','get')->name('lawyerCity.get');
        Route::get('getByCityId/{cityId}/{skip}/{take}','getByCityId')->name('lawyerCity.getByCityId');
        Route::get('getById/{id}','getById')->name('lawyerCity.getById');
    });
});

Route::controller(LawyerController::class)->group(function() {
    Route::prefix('lawyer')->group(function() {
        Route::get('get/{skip}/{take}','get')->name('lawyer.get');
        Route::get('getById/{id}','getById')->name('lawyer.getById');
    });
});

Route::controller(InsuranceSelectOptionController::class)->group(function() {
    Route::prefix('insuranceSelectOption')->group(function() {
        Route::get('get/{skip}/{take}','get')->name('insuranceSelectOption.get');
        Route::get('getById/{id}','getById')->name('insuranceSelectOption.getById');
    });
});

Route::controller(InsuranceSelectController::class)->group(function() {
    Route::prefix('insuranceSelect')->group(function() {
        Route::get('get/{skip}/{take}','get')->name('insuranceSelect.get');
        Route::get('getById/{id}','getById')->name('insuranceSelect.getById');
    });
});

Route::controller(InsuranceImageController::class)->group(function() {
    Route::prefix('insuranceImage')->group(function() {
        Route::get('get/{skip}/{take}','get')->name('insuranceImage.get');
        Route::get('getByUserId/{userId}/{skip}/{take}','getByUserId')->name('insuranceImage.getByUserId');
        Route::get('getByInsuranceCompanyId/{insuranceCompanyId}/{skip}/{take}','getByInsuranceCompanyId')->name('insuranceImage.getByInsuranceCompanyId');
        Route::get('getById/{id}','getById')->name('insuranceImage.getById');
    });
});

Route::controller(InsuranceLinkReferRecordController::class)->group(function() {
    Route::prefix('insuranceLinkReferRecord')->group(function() {
        Route::get('get/{skip}/{take}','get')->name('insuranceLinkReferRecord.get');
        Route::get('getByUserId/{userId}/{skip}/{take}','getByUserId')->name('insuranceLinkReferRecord.getByUserId');
        Route::get('getByInsuranceCompanyId/{insuranceCompanyId}/{skip}/{take}','getByInsuranceCompanyId')->name('insuranceLinkReferRecord.getByInsuranceCompanyId');
        Route::get('getById/{id}','getById')->name('insuranceLinkReferRecord.getById');
    });
});

Route::controller(InsuranceKaskoPolicyController::class)->group(function() {
    Route::prefix('insuranceKaskoPolicy')->group(function() {
        Route::get('get/{skip}/{take}','get')->name('insuranceKaskoPolicy.get');
        Route::get('getByUserId/{userId}/{skip}/{take}','getByUserId')->name('insuranceKaskoPolicy.getByUserId');
        Route::get('getByUserCarId/{userCarId}/{skip}/{take}','getByUserCarId')->name('insuranceKaskoPolicy.getByUserCarId');
        Route::get('getById/{id}','getById')->name('insuranceKaskoPolicy.getById');
    });
});

Route::controller(InsuranceCompanyRequestLogController::class)->group(function() {
    Route::prefix('insuranceCompanyRequestLog')->group(function() {
        Route::get('get/{skip}/{take}','get')->name('insuranceCompanyRequestLog.get');
        Route::get('getByInsuranceCompanyId/{insuranceCompanyId}/{skip}/{take}','getByInsuranceCompanyId')->name('insuranceCompanyRequestLog.getByInsuranceCompanyId');
        Route::get('getById/{id}','getById')->name('insuranceCompanyRequestLog.getById');
    });
});

Route::controller(InsuranceCompanyRequestLogController::class)->group(function() {
    Route::prefix('insuranceCompanyRequestLog')->group(function() {
        Route::get('get/{skip}/{take}','get')->name('insuranceCompanyRequestLog.get');
        Route::get('getByInsuranceCompanyId/{insuranceCompanyId}/{skip}/{take}','getByInsuranceCompanyId')->name('insuranceCompanyRequestLog.getByInsuranceCompanyId');
        Route::get('getById/{id}','getById')->name('insuranceCompanyRequestLog.getById');
    });
});

Route::controller(InsuranceCompanyProductController::class)->group(function() {
    Route::prefix('insuranceCompanyProduct')->group(function() {
        Route::get('get/{skip}/{take}','get')->name('insuranceCompanyProduct.get');
        Route::get('getByInsuranceCompanyId/{insuranceCompanyId}/{skip}/{take}','getByInsuranceCompanyId')->name('insuranceCompanyProduct.getByInsuranceCompanyId');
        Route::get('getById/{id}','getById')->name('insuranceCompanyProduct.getById');
    });
});

Route::controller(InsuranceCategoryController::class)->group(function() {
    Route::prefix('insuranceCategory')->group(function() {
        Route::get('get/{skip}/{take}','get')->name('insuranceCategory.get');
        Route::get('getById/{id}','getById')->name('insuranceCategory.getById');
    });
});

Route::controller(InsuranceCompanyController::class)->group(function() {
    Route::prefix('insuranceCompany')->group(function() {
        Route::get('get/{skip}/{take}','get')->name('insuranceCompany.get');
        Route::get('getById/{id}','getById')->name('insuranceCompany.getById');
    });
});

Route::controller(WalletRecordController::class)->group(function() {
    Route::prefix('walletRecord')->group(function() {
        Route::get('get/{skip}/{take}','get')->name('walletRecord.get');
        Route::get('getByPaymentId/{paymentId}/{skip}/{take}','getByPaymentId')->name('walletRecord.getByPaymentId');
        Route::get('getByWalletId/{walletId}/{skip}/{take}','getByWalletId')->name('walletRecord.getByUserId');
        Route::get('getById/{id}','getById')->name('walletRecord.getById');
    });
});

Route::controller(WalletController::class)->group(function() {
    Route::prefix('wallet')->group(function() {
        Route::get('get/{skip}/{take}','get')->name('wallet.get');
        Route::get('getByUserId/{userId}/{skip}/{take}','getByUserId')->name('wallet.getByUserId');
        Route::get('getById/{id}','getById')->name('wallet.getById');
    });
});

Route::controller(UserController::class)->group(function() {
    Route::prefix('user')->group(function() {
        Route::get('getByPhoneAndPassword/{phone}/{password}','getByPhoneAndPassword')
            ->name('user.getByPhoneAndPassword');
        Route::get('get/{skip}/{take}','get')->name('user.get');
        Route::get('getById/{id}','getById')->name('user.getById');
    });
});

Route::controller(UserCarController::class)->group(function() {
    Route::prefix('userCar')->group(function() {
        Route::get('get/{skip}/{take}','get')->name('userCar.get');
        Route::get('getByUserId/{userId}/{skip}/{take}','getByUserId')->name('userCar.getByUserId');
        Route::get('getByCarModelId/{carModelId}/{skip}/{take}','getByCarModelId')->name('userCar.getByCarModelId');
        Route::get('getById/{id}','getById')->name('userCar.getById');
    });
});

Route::controller(TransactionToNonExistingUserController::class)->group(function() {
    Route::prefix('transactionToNonExistingUser')->group(function() {
        Route::get('get/{skip}/{take}','get')->name('transactionToNonExistingUser.get');
        Route::get('getById/{id}','getById')->name('transactionToNonExistingUser.getById');
    });
});

Route::controller(TransactionController::class)->group(function() {
    Route::prefix('transaction')->group(function() {
        Route::get('get/{skip}/{take}','get')->name('transaction.get');
        Route::get('getById/{id}','getById')->name('transaction.getById');
    });
});

Route::controller(ThirdPartyAppController::class)->group(function() {
    Route::prefix('thirdPartyApp')->group(function() {
        Route::get('get/{skip}/{take}','get')->name('thirdPartyApp.get');
        Route::get('getById/{id}','getById')->name('thirdPartyApp.getById');
    });
});

Route::controller(StockController::class)->group(function() {
    Route::prefix('stock')->group(function() {
        Route::get('get/{skip}/{take}','get')->name('stock.get');
        Route::get('getById/{id}','getById')->name('stock.getById');
    });
});

Route::controller(StockController::class)->group(function() {
    Route::prefix('stock')->group(function() {
        Route::get('get/{skip}/{take}','get')->name('stock.get');
        Route::get('getById/{id}','getById')->name('stock.getById');
    });
});

Route::controller(StockImageController::class)->group(function() {
    Route::prefix('stockImage')->group(function() {
        Route::get('get/{skip}/{take}','get')->name('stockImage.get');
        Route::get('getByStockId/{stockId}/{skip}/{take}','getByStockId')->name('stockImage.getByStockId');
        Route::get('getById/{id}','getById')->name('stockImage.getById');
    });
});

Route::controller(RecurrentController::class)->group(function() {
    Route::prefix('recurrent')->group(function() {
        Route::get('get/{skip}/{take}','get')->name('recurrent.get');
        Route::get('getById/{id}','getById')->name('recurrent.getById');
    });
});

Route::controller(PlaceController::class)->group(function() {
    Route::prefix('place')->group(function() {
        Route::get('get/{skip}/{take}','get')->name('place.get');
        Route::get('getByServiceId/{serviceId}/{skip}/{take}','getByServiceId')->name('place.getByServiceId');
        Route::get('getByCityId/{cityId}/{skip}/{take}','getByCityId')->name('place.getByCityId');
        Route::get('getById/{id}','getById')->name('place.getById');
    });
});

Route::controller(PaymentSystemController::class)->group(function() {
    Route::prefix('paymentSystem')->group(function() {
        Route::get('get/{skip}/{take}','get')->name('paymentSystem.get');
        Route::get('getById/{id}','getById')->name('paymentSystem.getById');
    });
});

Route::controller(UserImageController::class)->group(function() {
    Route::prefix('userImage')->group(function() {
        Route::get('get/{skip}/{take}','get')->name('userImage.get');
        Route::get('getByUserId/{userId}/{skip}/{take}','getByUserId')->name('userImage.getByUserId');
        Route::get('getById/{id}','getById')->name('userImage.getById');
    });
});

Route::controller(PaymentController::class)->group(function() {
    Route::prefix('payment')->group(function() {
        Route::get('get/{skip}/{take}','get')->name('payment.get');
        Route::get('getByUserId/{userId}/{skip}/{take}','getByUserId')->name('payment.getByUserId');
        Route::get('getById/{id}','getById')->name('payment.getById');
    });
});

Route::controller(PartnerPurchaseController::class)->group(function() {
    Route::prefix('partnerPurchase')->group(function() {
        Route::get('get/{skip}/{take}','get')->name('partnerPurchase.get');
        Route::get('getByPartnerId/{partnerId}/{skip}/{take}','getByPartnerId')->name('partnerPurchase.getByPartnerId');
        Route::get('getById/{id}','getById')->name('partnerPurchase.getById');
    });
});

Route::controller(PartnerCardController::class)->group(function() {
    Route::prefix('partnerCard')->group(function() {
        Route::get('get/{skip}/{take}','get')->name('partnerCard.get');
        Route::get('getByCardId/{cardId}/{skip}/{take}','getByCardId')->name('partnerCard.getByCardId');
        Route::get('getByPartnerId/{partnerId}/{skip}/{take}','getByPartnerId')->name('partnerCard.getByPartnerId');
        Route::get('getById/{id}','getById')->name('partnerCard.getById');
    });
});

Route::controller(PartnerController::class)->group(function() {
    Route::prefix('partner')->group(function() {
        Route::get('get/{skip}/{take}','get')->name('partner.get');
        Route::get('getById/{id}','getById')->name('partner.getById');
    });
});

Route::controller(MessageController::class)->group(function() {
    Route::prefix('message')->group(function() {
        Route::get('get/{skip}/{take}','get')->name('message.get');
        Route::get('getById/{id}','getById')->name('message.getById');
    });
});

Route::controller(OrderCardOldController::class)->group(function() {
    Route::prefix('orderCardOld')->group(function() {
        Route::get('get/{skip}/{take}','get')->name('orderCardOld.get');
        Route::get('getById/{id}','getById')->name('orderCardOld.getById');
    });
});

Route::controller(OrderServiceController::class)->group(function() {
    Route::prefix('orderService')->group(function() {
        Route::get('get/{skip}/{take}','get')->name('orderService.get');
        Route::get('getByUserId/{userId}/{skip}/{take}','getByUserId')->name('orderService.getByUserId');
        Route::get('getByCityId/{cityId}/{skip}/{take}','getByCityId')->name('orderService.getByCityId');
        Route::get('getByPlaceId/{placeId}/{skip}/{take}','getByPlaceId')->name('orderService.getByPlaceId');
        Route::get('getByOrderCardId/{orderCardId}/{skip}/{take}','getByOrderCardId')->name('orderService.getByOrderCardId');
        Route::get('getById/{id}','getById')->name('orderService.getById');
    });
});

Route::controller(OrderCardController::class)->group(function() {
    Route::prefix('orderCard')->group(function() {
        Route::get('get/{skip}/{take}','get')->name('orderCard.get');
        Route::get('getByUserId/{userId}/{skip}/{take}','getByUserId')->name('orderCard.getByUserId');
        Route::get('getByCardId/{cardId}/{skip}/{take}','getByCardId')->name('orderCard.getByCardId');
        Route::get('getById/{id}','getById')->name('orderCard.getById');
    });
});

Route::controller(GiftController::class)->group(function() {
    Route::prefix('gift')->group(function() {
        Route::get('get/{skip}/{take}','get')->name('gift.get');
        Route::get('getByUserId/{userId}/{skip}/{take}','getByUserId')->name('gift.getByUserId');
        Route::get('getByCardId/{cardId}/{skip}/{take}','getByCardId')->name('gift.getByCardId');
        Route::get('getById/{id}','getById')->name('gift.getById');
    });
});

Route::controller(EcoServiceController::class)->group(function() {
    Route::prefix('ecoService')->group(function() {
        Route::get('get/{skip}/{take}','get')->name('ecoService.get');
        Route::get('getById/{id}','getById')->name('ecoService.getById');
    });
});

Route::controller(DriverController::class)->group(function() {
    Route::prefix('driver')->group(function() {
        Route::get('get/{skip}/{take}','get')->name('driver.get');
        Route::get('getByOrderCardId/{orderCardId}','getByOrderCardId')->name('driver.getByOrderCardId');
        Route::get('getById/{id}','getById')->name('driver.getById');
    });
});

Route::controller(CodeController::class)->group(function() {
    Route::prefix('code')->group(function() {
        Route::post('create','create')->name('code.create');
        Route::post('update','update')->name('code.update');
        Route::get('get/{skip}/{take}','get')->name('code.get');
        Route::get('getByPhone/{phone}','getByPhone')->name('code.getByPhone');
        Route::get('getByEmail/{email}','getByEmail')->name('code.getByEmail');
        Route::get('getById/{id}','getById')->name('code.getById');
    });
});

Route::controller(OrderServiceServiceController::class)->group(function() {
    Route::prefix('orderServiceService')->group(function() {
        Route::get('get/{skip}/{take}','get')->name('cityService.get');
        Route::get('getByOrderServiceId/{orderServiceId}/{skip}/{take}','getByOrderServiceId')->name('cityService.getByOrderServiceId');
        Route::get('getByServiceId/{serviceId}/{skip}/{take}','getByServiceId')->name('cityService.getByServiceId');
        Route::get('getById/{id}','getById')->name('cityService.getById');
    });
});

Route::controller(CityServiceController::class)->group(function() {
    Route::prefix('cityService')->group(function() {
        Route::get('get/{skip}/{take}','get')->name('cityService.get');
        Route::get('getByServiceId/{serviceId}/{skip}/{take}','getByServiceId')->name('cityService.getByServiceId');
        Route::get('getByCityId/{cityId}/{skip}/{take}','getByCityId')->name('cityService.getByCityId');
        Route::get('getById/{id}','getById')->name('cityService.getById');
    });
});

Route::controller(CarController::class)->group(function() {
    Route::prefix('car')->group(function() {
        Route::get('get/{skip}/{take}','get')->name('car.get');
        Route::get('getByOrderCardId/{orderCardId}','getByOrderCardId')->name('car.getByOrderCardId');
        Route::get('getById/{id}','getById')->name('car.getById');
    });
});

Route::controller(CardServiceController::class)->group(function() {
    Route::prefix('cardService')->group(function() {
        Route::get('get/{skip}/{take}','get')->name('cardService.get');
        Route::get('getByCardId/{cardId}/{skip}/{take}','getByCardId')->name('cardService.getByCardId');
        Route::get('getByServiceId/{cityId}/{skip}/{take}','getByServiceId')->name('cardService.getByServiceId');
        Route::get('getById/{id}','getById')->name('cardService.getById');
    });
});

Route::controller(CardRangeController::class)->group(function() {
    Route::prefix('cardRange')->group(function() {
        Route::get('get/{skip}/{take}','get')->name('cardRange.get');
        Route::get('getByCardId/{cardId}/{skip}/{take}','getByCardId')->name('cardRange.getByCardId');
        Route::get('getByCityId/{cityId}/{skip}/{take}','getByCityId')->name('cardRange.getByCityId');
        Route::get('getById/{id}','getById')->name('cardRange.getById');
    });
});

Route::controller(CarModelAveragePriceController::class)->group(function() {
    Route::prefix('carModelAveragePrice')->group(function() {
        Route::get('get/{skip}/{take}','get')->name('carModelAveragePrice.get');
        Route::get('getByCarModelId/{carModelId}/{skip}/{take}','getByCarModelId')->name('carModelAveragePrice.getByCarModelId');
        Route::get('getById/{id}','getById')->name('carModelAveragePrice.getById');
    });
});

Route::controller(CardController::class)->group(function() {
    Route::prefix('card')->group(function() {
        Route::get('get/{skip}/{take}','get')->name('card.get');
        Route::get('getById/{id}','getById')->name('card.getById');
    });
});

Route::controller(ImageController::class)->group(function() {
    Route::prefix('image')->group(function() {
        Route::get('get/{skip}/{take}','get')->name('image.get');
        Route::get('getByUserId/{userId}/{skip}/{take}','getByUserId')->name('image.getByUserId');
        Route::get('getById/{id}','getById')->name('image.getById');
    });
});

Route::controller(AutoPartImageController::class)->group(function() {
    Route::prefix('autoPartImage')->group(function() {
        Route::get('get/{skip}/{take}','get')->name('autoPartImage.get');
        Route::get('getByAutoPartId/{autoPartId}/{skip}/{take}','getByAutoPartId')->name('autoPartImage.getByAutoPartId');
        Route::get('getById/{id}','getById')->name('autoPartImage.getById');
    });
});

Route::controller(AutoPartController::class)->group(function() {
    Route::prefix('autoPart')->group(function() {
        Route::get('get/{skip}/{take}','get')->name('autoPart.get');
        Route::get('getById/{id}','getById')->name('autoPart.getById');
    });
});

Route::controller(ServiceLimitController::class)->group(function() {
    Route::prefix('serviceLimit')->group(function() {
        Route::get('get/{skip}/{take}','get')->name('serviceLimit.get');
        Route::get('getById/{id}','getById')->name('serviceLimit.getById');
    });
});

Route::controller(MoneyOperationTypeController::class)->group(function() {
    Route::prefix('moneyOperationType')->group(function() {
        Route::get('get/{skip}/{take}','get')->name('moneyOperationType.get');
        Route::get('getById/{id}','getById')->name('moneyOperationType.getById');
    });
});

Route::controller(MoneyOperationController::class)->group(function() {
    Route::prefix('moneyOperation')->group(function() {
        Route::get('get/{skip}/{take}','get')->name('moneyOperation.get');
        Route::get('getById/{id}','getById')->name('moneyOperation.getById');
    });
});

Route::controller(ServicePriceController::class)->group(function() {
    Route::prefix('servicePrice')->group(function() {
        Route::get('get/{skip}/{take}','get')->name('servicePrice.get');
        Route::get('getById/{id}','getById')->name('servicePrice.getById');
    });
});

Route::controller(ServiceTypeController::class)->group(function() {
    Route::prefix('serviceType')->group(function() {
        Route::get('get/{skip}/{take}','get')->name('serviceType.get');
        Route::get('getById/{id}','getById')->name('serviceType.getById');
    });
});

Route::controller(ServiceController::class)->group(function() {
    Route::prefix('service')->group(function() {
        Route::get('get/{skip}/{take}','get')->name('service.get');
        Route::get('getById/{id}','getById')->name('service.getById');
    });
});

Route::controller(ServiceImageController::class)->group(function() {
    Route::prefix('serviceImage')->group(function() {
        Route::get('get/{skip}/{take}','get')->name('serviceImage.get');
        Route::get('getByServiceId/{stockId}/{skip}/{take}','getByServiceId')->name('serviceImage.getByServiceId');
        Route::get('getById/{id}','getById')->name('serviceImage.getById');
    });
});

Route::controller(CardCategoryController::class)->group(function() {
    Route::prefix('cardCategory')->group(function() {
        Route::get('get/{skip}/{take}','get')->name('cardCategory.get');
    });
});

Route::controller(RegionController::class)->group(function() {
    Route::prefix('region')->group(function() {
        Route::get('get/{skip}/{take}','get')->name('region.get');
    });
});

Route::controller(CountryController::class)->group(function() {
    Route::prefix('country')->group(function() {
        Route::get('get/{skip}/{take}','get')->name('country.get');
    });
});

Route::controller(CurrencyController::class)->group(function() {
    Route::prefix('currency')->group(function() {
        Route::get('get/{skip}/{take}','get')->name('currency.get');
    });
});

Route::controller(CityController::class)->group(function() {
    Route::prefix('city')->group(function() {
        Route::get('get/{skip}/{take}','get')->name('city.get');
    });
});

Route::controller(CarModelController::class)->group(function() {
    Route::prefix('carModel')->group(function() {
        Route::get('get/{skip}/{take}','get')->name('carModel.get');
        Route::get('getByCarBrandId/{carBrandId}/{skip}/{take}','getByCarBrandId')->name('carModel.getByCarBrandId');
        Route::get('getById/{id}','getById')->name('carModel.getById');
    });
});

Route::controller(CarBrandController::class)->group(function() {
    Route::prefix('carBrand')->group(function() {
        Route::get('get/{skip}/{take}','get')->name('carBrand.get');
    });
});

Route::controller(CarCategoryController::class)->group(function() {
    Route::prefix('carCategory')->group(function() {
        Route::get('get/{skip}/{take}','get')->name('carCategory.get');
    });
});

Route::controller(AutoPartParamOptionController::class)->group(function() {
    Route::prefix('autoPartParamOption')->group(function() {
        Route::get('get/{skip}/{take}','get')->name('autoPartParamOption.get');
    });
});

Route::controller(AutoPartTypeController::class)->group(function() {
    Route::prefix('autoPartType')->group(function() {
        Route::get('get/{skip}/{take}','get')->name('autoPartType.get');
    });
});

Route::controller(AutoPartParamController::class)->group(function() {
    Route::prefix('autoPartParam')->group(function() {
        Route::get('get/{skip}/{take}','get')->name('autoPartParam.get');
        Route::get('getById/{id}','getById')->name('autoPartParam.getById');
    });
});

Route::controller(AutoPartCategoryController::class)->group(function() {
    Route::prefix('autoPartCategory')->group(function() {
        Route::get('get/{skip}/{take}','get')->name('autoPartCategory.get');
        Route::get('getById/{id}','getById')->name('autoPartCategory.getById');
    });
});

Route::controller(NewsController::class)->group(function() {
    Route::prefix('news')->group(function() {
        Route::get('get/{skip}/{take}','get')->name('news.get');
        Route::get('getById/{id}','getById')->name('news.getById');
    });
});

Route::controller(NewsCategoryController::class)->group(function() {
    Route::prefix('newsCategory')->group(function() {
        Route::get('get/{skip}/{take}','get')->name('newsCategory.get');
    });
});
