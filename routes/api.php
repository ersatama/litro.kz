<?php

use App\Http\Controllers\Api\AutoPartCategoryController;
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
use App\Http\Controllers\Api\NewsCategoryController;
use App\Http\Controllers\Api\NewsController;
use App\Http\Controllers\Api\RegionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(CardCategoryController::class)->group(function() {
    Route::prefix('cardCategory')->group(function() {
        Route::get('get','get')->name('cardCategory.get');
    });
});

Route::controller(RegionController::class)->group(function() {
    Route::prefix('region')->group(function() {
        Route::get('get','get')->name('region.get');
    });
});

Route::controller(CountryController::class)->group(function() {
    Route::prefix('country')->group(function() {
        Route::get('get','get')->name('country.get');
    });
});

Route::controller(CurrencyController::class)->group(function() {
    Route::prefix('currency')->group(function() {
        Route::get('get','get')->name('currency.get');
    });
});

Route::controller(CityController::class)->group(function() {
    Route::prefix('city')->group(function() {
        Route::get('get','get')->name('city.get');
    });
});

Route::controller(CarModelController::class)->group(function() {
    Route::prefix('carModel')->group(function() {
        Route::get('get','get')->name('carModel.get');
        Route::get('getById/{id}','get')->name('carModel.getById');
        Route::get('getByBrandId/{brandId}','getByBrandId')->name('carModel.getByBrandId');
    });
});

Route::controller(CarBrandController::class)->group(function() {
    Route::prefix('carBrand')->group(function() {
        Route::get('get','get')->name('carBrand.get');
    });
});

Route::controller(CarCategoryController::class)->group(function() {
    Route::prefix('carCategory')->group(function() {
        Route::get('get','get')->name('carCategory.get');
    });
});

Route::controller(AutoPartParamOptionController::class)->group(function() {
    Route::prefix('autoPartParamOption')->group(function() {
        Route::get('get','get')->name('autoPartParamOption.get');
    });
});

Route::controller(AutoPartTypeController::class)->group(function() {
    Route::prefix('autoPartType')->group(function() {
        Route::get('get','get')->name('autoPartType.get');
    });
});

Route::controller(AutoPartParamController::class)->group(function() {
    Route::prefix('autoPartParam')->group(function() {
        Route::get('get','get')->name('autoPartParam.get');
    });
});

Route::controller(AutoPartCategoryController::class)->group(function() {
    Route::prefix('autoPartCategory')->group(function() {
        Route::get('get','get')->name('autoPartCategory.get');
    });
});

Route::controller(NewsController::class)->group(function() {
    Route::prefix('news')->group(function() {
        Route::get('get','get')->name('news.get');
        Route::get('getById/{id}','getById')->name('news.getById');
    });
});

Route::controller(NewsCategoryController::class)->group(function() {
    Route::prefix('newsCategory')->group(function() {
        Route::get('get','get')->name('newsCategory.get');
    });
});
