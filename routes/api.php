<?php

use App\Http\Controllers\Api\AutoPartCategoryController;
use App\Http\Controllers\Api\AutoPartController;
use App\Http\Controllers\Api\AutoPartParamController;
use App\Http\Controllers\Api\AutoPartParamOptionController;
use App\Http\Controllers\Api\AutoPartTypeController;
use App\Http\Controllers\Api\CarBrandController;
use App\Http\Controllers\Api\CarCategoryController;
use App\Http\Controllers\Api\CardCategoryController;
use App\Http\Controllers\Api\CarModelController;
use App\Http\Controllers\Api\CityController;
use App\Http\Controllers\Api\CountryController;
use App\Http\Controllers\Api\CurrencyController;
use App\Http\Controllers\Api\MoneyOperationController;
use App\Http\Controllers\Api\MoneyOperationTypeController;
use App\Http\Controllers\Api\NewsCategoryController;
use App\Http\Controllers\Api\NewsController;
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
        Route::get('getByCarBrandId/{carBrandId}/{skip}/{take}','getByBrandId')->name('carModel.getByCarBrandId');
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
