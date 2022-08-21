<?php

namespace App\Domain\Repositories;

use App\Domain\Contracts\MainContract;

trait MainRepositoryEloquent
{
    public function get($skip,$take)
    {
        return $this->model::skip($skip)->take($take)->get();
    }

    public function getById($id)
    {
        return $this->model::where(MainContract::ID,$id)->first();
    }

    public function count($where)
    {
        return $this->model::where($where)->count();
    }

    public function getByCardId($cardId,$skip,$take)
    {
        return $this->model::where(MainContract::CARD_ID, $cardId)
            ->skip($skip)
            ->take($take)
            ->get();
    }

    public function getByUserId($userId,$skip,$take)
    {
        return $this->model::where(MainContract::USER_ID,$userId)
            ->skip($skip)
            ->take($take)
            ->get();
    }

    public function getByServiceId($serviceId,$skip,$take)
    {
        return $this->model::where(MainContract::SERVICE_ID, $serviceId)
            ->skip($skip)
            ->take($take)
            ->get();
    }

    public function getByCityId($cityId,$skip,$take)
    {
        return $this->model::where(MainContract::CITY_ID, $cityId)
            ->skip($skip)
            ->take($take)
            ->get();
    }

    public function getByCarModelId($carModelId,$skip,$take)
    {
        return $this->model::where(MainContract::CAR_MODEL_ID,$carModelId)
            ->skip($skip)
            ->take($take)
            ->get();
    }

    public function getByCarBrandId($carBrandId,$skip,$take)
    {
        return $this->model::where(MainContract::CAR_BRAND_ID,$carBrandId)
            ->skip($skip)
            ->take($take)
            ->get();
    }
}
