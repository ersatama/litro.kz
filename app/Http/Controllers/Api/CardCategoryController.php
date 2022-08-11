<?php

namespace App\Http\Controllers\Api;

use App\Domain\Services\CardCategoryService;
use App\Http\Controllers\Controller;
use App\Http\Resources\CardCategory\CardCategoryCollection;
use Illuminate\Http\Request;

class CardCategoryController extends Controller
{
    protected CardCategoryService $cardCategoryService;
    public function __construct(CardCategoryService $cardCategoryService)
    {
        $this->cardCategoryService  =   $cardCategoryService;
    }

    public function get(): CardCategoryCollection
    {
        return new CardCategoryCollection($this->cardCategoryService->get());
    }

}
