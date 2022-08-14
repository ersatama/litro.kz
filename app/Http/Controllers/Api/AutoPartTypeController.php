<?php

namespace App\Http\Controllers\Api;

use App\Domain\Contracts\MainContract;
use App\Domain\Services\AutoPartTypeService;
use App\Http\Controllers\Controller;
use App\Http\Resources\AutoPartType\AutoPartTypeCollection;
use Illuminate\Http\Request;

class AutoPartTypeController extends Controller
{
    protected AutoPartTypeService $autoPartTypeService;
    public function __construct(AutoPartTypeService $autoPartTypeService)
    {
        $this->autoPartTypeService  =   $autoPartTypeService;
    }

    public function get($skip,$take)
    {
        return response([
            MainContract::INFO  =>  [
                MainContract::SKIP  =>  $skip,
                MainContract::TAKE  =>  $take,
                MainContract::COUNT =>  $this->autoPartTypeService->count([]),
            ],
            MainContract::DATA  =>  new AutoPartTypeCollection($this->autoPartTypeService->get($skip,$take))
        ],200);
    }

}
