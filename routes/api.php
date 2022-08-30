<?php

use App\Http\Controllers\Api\AutoPartCategoryController;
use App\Http\Controllers\Api\AutoPartController;
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
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\CityController;
use App\Http\Controllers\Api\CityServiceController;
use App\Http\Controllers\Api\CodeController;
use App\Http\Controllers\Api\CountryController;
use App\Http\Controllers\Api\CurrencyController;
use App\Http\Controllers\Api\DriverController;
use App\Http\Controllers\Api\EcoServiceController;
use App\Http\Controllers\Api\GiftController;
use App\Http\Controllers\Api\ImageController;
use App\Http\Controllers\Api\MoneyOperationController;
use App\Http\Controllers\Api\MoneyOperationTypeController;
use App\Http\Controllers\Api\NewsCategoryController;
use App\Http\Controllers\Api\NewsController;
use App\Http\Controllers\Api\OrderCardController;
use App\Http\Controllers\Api\OrderServiceController;
use App\Http\Controllers\Api\RegionController;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\ServiceLimitController;
use App\Http\Controllers\Api\ServicePriceController;
use App\Http\Controllers\Api\ServiceTypeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE');
header('Access-Control-Allow-Headers: Content-Type, X-Auth-Token, Origin, Authorization,X-localization,X-No-Cache');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
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

Route::controller(CategoryController::class)->group(function() {
    Route::prefix('category')->group(function() {
        Route::get('get/{skip}/{take}','get')->name('category.get');
        Route::get('getById/{id}','getById')->name('category.getById');
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
    });
});

Route::controller(AutoPartCategoryController::class)->group(function() {
    Route::prefix('autoPartCategory')->group(function() {
        Route::get('get/{skip}/{take}','get')->name('autoPartCategory.get');
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
