<?php

namespace App\Http\Controllers\Api;

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

    public function get(): AutoPartTypeCollection
    {
        return new AutoPartTypeCollection($this->autoPartTypeService->get());
    }

}
