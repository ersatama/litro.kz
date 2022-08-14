<?php

namespace App\Http\Controllers\Api;

use App\Domain\Contracts\MainContract;
use App\Domain\Services\RegionService;
use App\Http\Controllers\Controller;
use App\Http\Resources\Region\RegionCollection;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RegionController extends Controller
{
    protected RegionService $regionService;
    public function __construct(RegionService $regionService)
    {
        $this->regionService    =   $regionService;
    }

    public function get($skip,$take): Response|Application|ResponseFactory
    {
        return response([
            MainContract::INFO  =>  [
                MainContract::SKIP  =>  $skip,
                MainContract::TAKE  =>  $take,
                MainContract::COUNT =>  $this->regionService->count([]),
            ],
            MainContract::DATA  =>  new RegionCollection($this->regionService->get($skip,$take))
        ]);
    }

}
