<?php

namespace App\Http\Controllers\Api;

use App\Domain\Services\CurrencyService;
use App\Http\Controllers\Controller;
use App\Http\Resources\Currency\CurrencyCollection;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    protected CurrencyService $currencyService;
    public function __construct(CurrencyService $currencyService)
    {
        $this->currencyService  =   $currencyService;
    }

    public function get(): CurrencyCollection
    {
        return new CurrencyCollection($this->currencyService->get());
    }

}
