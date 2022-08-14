<?php

namespace App\Http\Controllers\Api;

use App\Domain\Contracts\MainContract;
use App\Domain\Services\CountryService;
use App\Http\Controllers\Controller;
use App\Http\Resources\Country\CountryCollection;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CountryController extends Controller
{
    protected CountryService $countryService;
    public function __construct(CountryService $countryService)
    {
        $this->countryService   =   $countryService;
    }

    public function get($skip,$take): Response|Application|ResponseFactory
    {
        return response([
            MainContract::INFO  =>  [
                MainContract::SKIP  =>  $skip,
                MainContract::TAKE  =>  $take,
                MainContract::COUNT =>  $this->countryService->count([]),
            ],
            MainContract::DATA  =>  new CountryCollection($this->countryService->get($skip,$take))
        ],200);
    }

}
