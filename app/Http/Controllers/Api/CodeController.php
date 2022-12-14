<?php

namespace App\Http\Controllers\Api;

use App\Domain\Contracts\ErrorContract;
use App\Domain\Contracts\Contract;
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

    /**
     * Получить список - Code
     *
     * @group Code - Код
     */
    public function get($skip,$take): Response|Application|ResponseFactory
    {
        return response([
            Contract::COUNT =>  $this->codeService->codeRepository->count([]),
            Contract::DATA  =>  new CodeCollection($this->codeService->codeRepository->get($skip,$take))
        ],200);
    }

    /**
     * Создать - Code
     *
     * @throws ValidationException
     * @group Code - Код
     */
    public function create(CodeCreateRequest $codeCreateRequest): CodeResource
    {
        return new CodeResource($this->codeService->codeRepository->create($codeCreateRequest->checked()));
    }

    /**
     * Обновить - Code
     *
     * @throws ValidationException
     * @group Code - Код
     */
    public function update(CodeUpdateRequest $codeUpdateRequest): Response|Application|CodeResource|ResponseFactory
    {
        $data   =   $codeUpdateRequest->checked();
        if (array_key_exists(Contract::PHONE,$data)) {
            $code   =   $this->codeService->codeRepository->getByPhone($data[Contract::PHONE]);
        } else {
            $code   =   $this->codeService->codeRepository->getByEmail($data[Contract::EMAIL]);
        }
        if ($code && $code[Contract::CODE] === $data[Contract::CODE]) {
            return new CodeResource($this->codeService->update($code,[
                Contract::STATUS    =>  true
            ]));
        }
        return response(ErrorContract::INCORRECT_CODE,400);
    }

    /**
     * Получить данные через Email - Code
     *
     * @group Code - Код
     */
    public function getByEmail($email): Response|CodeResource|Application|ResponseFactory
    {
        if ($carModel = $this->codeService->codeRepository->getByEmail($email)) {
            return new CodeResource($carModel);
        }
        return response(ErrorContract::ERROR_NOT_FOUND,404);
    }

    /**
     * Получить данные через Phone - Code
     *
     * @group Code - Код
     */
    public function getByPhone($phone): Response|CodeResource|Application|ResponseFactory
    {
        if ($carModel = $this->codeService->codeRepository->getByPhone($phone)) {
            return new CodeResource($carModel);
        }
        return response(ErrorContract::ERROR_NOT_FOUND,404);
    }

    /**
     * Получить данные через ID - Code
     *
     * @group Code - Код
     */
    public function getById($id): Response|CodeResource|Application|ResponseFactory
    {
        if ($carModel = $this->codeService->codeRepository->getById($id)) {
            return new CodeResource($carModel);
        }
        return response(ErrorContract::ERROR_NOT_FOUND,404);
    }

}
