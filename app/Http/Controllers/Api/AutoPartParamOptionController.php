<?php

namespace App\Http\Controllers\Api;

use App\Domain\Services\AutoPartParamOptionService;
use App\Http\Controllers\Controller;
use App\Http\Resources\AutoPartParamOption\AutoPartParamOptionCollection;
use Illuminate\Http\Request;

class AutoPartParamOptionController extends Controller
{
    protected AutoPartParamOptionService $autoPartParamOptionService;
    public function __construct(AutoPartParamOptionService $autoPartParamOptionService)
    {
        $this->autoPartParamOptionService   =   $autoPartParamOptionService;
    }

    public function get(): AutoPartParamOptionCollection
    {
        return new AutoPartParamOptionCollection($this->autoPartParamOptionService->get());
    }

}
