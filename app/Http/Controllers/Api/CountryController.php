<?php

namespace App\Http\Controllers\Api;

use App\Domain\Contracts\Contract;
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

    /**
     * Получить список - Country
     *
     * @group Country - Страна
     */
    public function get($skip,$take): Response|Application|ResponseFactory
    {
        return response([
            Contract::COUNT =>  $this->countryService->countryRepository->count([]),
            Contract::DATA  =>  new CountryCollection($this->countryService->countryRepository->get($skip,$take))
        ],200);
    }

}
