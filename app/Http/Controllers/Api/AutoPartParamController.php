<?php

namespace App\Http\Controllers\Api;

use App\Domain\Services\AutoPartParamService;
use App\Http\Controllers\Controller;
use App\Http\Resources\AutoPartParam\AutoPartParamCollection;
use Illuminate\Http\Request;

class AutoPartParamController extends Controller
{
    protected AutoPartParamService $autoPartParamService;
    public function __construct(AutoPartParamService $autoPartParamService)
    {
        $this->autoPartParamService =   $autoPartParamService;
    }

    public function get(): AutoPartParamCollection
    {
        return new AutoPartParamCollection($this->autoPartParamService->get());
    }

}
