<?php

namespace App\Http\Controllers\Api;

use App\Domain\Contracts\Contract;
use App\Domain\Services\EcoServiceImageService;
use App\Http\Controllers\Controller;
use App\Http\Resources\EcoServiceImage\EcoServiceImageCollection;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EcoServiceImageController extends Controller
{
    protected EcoServiceImageService $ecoServiceImageService;
    public function __construct(EcoServiceImageService $ecoServiceImageService)
    {
        $this->ecoServiceImageService   =   $ecoServiceImageService;
    }

    /**
     * Получить список - EcoServiceImage
     *
     * @group EcoServiceImage
     */
    public function get($skip,$take): Response|Application|ResponseFactory
    {
        return response([
            Contract::COUNT =>  $this->ecoServiceImageService->ecoServiceImageRepository->count([]),
            Contract::DATA  =>  new EcoServiceImageCollection($this->ecoServiceImageService->ecoServiceImageRepository->get($skip,$take))
        ],200);
    }
}
