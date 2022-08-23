<?php

namespace App\Http\Controllers\Api;

use App\Domain\Contracts\ErrorContract;
use App\Domain\Contracts\MainContract;
use App\Domain\Requests\Code\CodeCreateRequest;
use App\Domain\Requests\Code\CodeUpdateRequest;
use App\Domain\Services\CodeService;
use App\Http\Controllers\Controller;
use App\Http\Resources\Code\CodeCollection;
use App\Http\Resources\Code\CodeResource;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class CodeController extends Controller
{
    protected CodeService $codeService;
    public function __construct(CodeService $codeService)
    {
        $this->codeService  =   $codeService;
    }

    public function get($skip,$take): Response|Application|ResponseFactory
    {
        return response([
            MainContract::COUNT =>  $this->codeService->codeRepository->count([]),
            MainContract::DATA  =>  new CodeCollection($this->codeService->codeRepository->get($skip,$take))
        ],200);
    }

    /**
     * @throws ValidationException
     */
    public function create(CodeCreateRequest $codeCreateRequest): CodeResource
    {
        return new CodeResource($this->codeService->codeRepository->create($codeCreateRequest->checked()));
    }

    /**
     * @throws ValidationException
     */
    public function update(CodeUpdateRequest $codeUpdateRequest): Response|Application|CodeResource|ResponseFactory
    {
        $data   =   $codeUpdateRequest->checked();
        if (array_key_exists(MainContract::PHONE,$data)) {
            $code   =   $this->codeService->codeRepository->getByPhone($data[MainContract::PHONE]);
        } else {
            $code   =   $this->codeService->codeRepository->getByEmail($data[MainContract::EMAIL]);
        }
        if ($code && $code[MainContract::CODE] === $data[MainContract::CODE]) {
            return new CodeResource($this->codeService->update($code,[
                MainContract::STATUS    =>  true
            ]));
        }
        return response(ErrorContract::INCORRECT_CODE,400);
    }

    public function getByEmail($email): Response|CodeResource|Application|ResponseFactory
    {
        if ($carModel = $this->codeService->codeRepository->getByEmail($email)) {
            return new CodeResource($carModel);
        }
        return response(ErrorContract::ERROR_NOT_FOUND,404);
    }

    public function getByPhone($phone): Response|CodeResource|Application|ResponseFactory
    {
        if ($carModel = $this->codeService->codeRepository->getByPhone($phone)) {
            return new CodeResource($carModel);
        }
        return response(ErrorContract::ERROR_NOT_FOUND,404);
    }

    public function getById($id): Response|CodeResource|Application|ResponseFactory
    {
        if ($carModel = $this->codeService->codeRepository->getById($id)) {
            return new CodeResource($carModel);
        }
        return response(ErrorContract::ERROR_NOT_FOUND,404);
    }

}
