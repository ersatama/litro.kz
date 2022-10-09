<?php

namespace App\Domain\Repositories;

use App\Domain\Contracts\Contract;

trait RepositoryEloquent
{

    public function getByCarModelIdAndYear($carModelId,$year)
    {
        return $this->model::where([
            Contract::CAR_MODEL_ID  =>  $carModelId,
            Contract::YEAR  =>  $year
        ])->first();
    }

    public function getByAutoPartId($autoPartId,$skip,$take)
    {
        return $this->model::where(Contract::AUTO_PART_ID,$autoPartId)
            ->skip($skip)
            ->take($take)
            ->get();
    }

    public function getByStockId($stockId,$skip,$take)
    {
        return $this->model::where(Contract::STOCK_ID,$stockId)
            ->skip($skip)
            ->take($take)
            ->get();
    }

    public function getByOrderServiceId($orderServiceId,$skip,$take)
    {
        return $this->model::where(Contract::ORDER_SERVICE_ID,$orderServiceId)
            ->skip($skip)
            ->take($take)
            ->get();
    }

    public function getBySPartnerPointWalletId($sPartnerPointWalletId,$skip,$take)
    {
        return $this->model::where(Contract::S_PARTNER_POINT_WALLET_ID,$sPartnerPointWalletId)
            ->skip($skip)
            ->take($take)
            ->get();
    }

    public function getBySPartnerPointId($sPartnerPoint,$skip,$take)
    {
        return $this->model::where(Contract::S_PARTNER_POINT_ID,$sPartnerPoint)
            ->skip($skip)
            ->take($take)
            ->get();
    }

    public function getByLawyerId($lawyerId,$skip,$take)
    {
        return $this->model::where(Contract::LAWYER_ID,$lawyerId)
            ->skip($skip)
            ->take($take)
            ->get();
    }

    public function getByUserCarId($userCarId,$skip,$take)
    {
        return $this->model::where(Contract::USER_CAR_ID,$userCarId)
            ->skip($skip)
            ->take($take)
            ->get();
    }

    public function getByInsuranceCompanyId($insuranceCompanyId,$skip,$take)
    {
        return $this->model::where(Contract::INSURANCE_COMPANY_ID, $insuranceCompanyId)
            ->skip($skip)
            ->take($take)
            ->get();
    }

    public function getByPaymentId($paymentId,$skip,$take)
    {
        return $this->model::where(Contract::PAYMENT_ID, $paymentId)
            ->skip($skip)
            ->take($take)
            ->get();
    }

    public function getByWalletId($walletId,$skip,$take)
    {
        return $this->model::where(Contract::WALLET_ID, $walletId)
            ->skip($skip)
            ->take($take)
            ->get();
    }

    public function getByPhone($phone)
    {
        return $this->model::where(Contract::PHONE,$phone)
            ->first();
    }

    public function get($skip,$take)
    {
        return $this->model::skip($skip)->take($take)
            ->get();
    }

    public function getById($id)
    {
        return $this->model::where(Contract::ID,$id)
            ->first();
    }

    public function count($where)
    {
        return $this->model::where($where)
            ->count();
    }

    public function getByCardId($cardId,$skip,$take)
    {
        return $this->model::where(Contract::CARD_ID, $cardId)
            ->skip($skip)
            ->take($take)
            ->get();
    }

    public function getByPlaceId($placeId,$skip,$take)
    {
        return $this->model::where(Contract::PLACE_ID,$placeId)
            ->skip($skip)
            ->take($take)
            ->get();
    }

    public function getByUserId($userId,$skip,$take)
    {
        return $this->model::where(Contract::USER_ID,$userId)
            ->skip($skip)
            ->take($take)
            ->get();
    }

    public function getByOrderCardId($orderCardId)
    {
        return $this->model::where(Contract::ORDER_CARD_ID,$orderCardId)
            ->get();
    }

    public function getByPartnerId($partnerId,$skip,$take)
    {
        return $this->model::where(Contract::PARTNER_ID, $partnerId)
            ->skip($skip)
            ->take($take)
            ->get();
    }

    public function getByServiceId($serviceId,$skip,$take)
    {
        return $this->model::where(Contract::SERVICE_ID, $serviceId)
            ->skip($skip)
            ->take($take)
            ->get();
    }

    public function getByCityId($cityId,$skip,$take)
    {
        return $this->model::where(Contract::CITY_ID, $cityId)
            ->skip($skip)
            ->take($take)
            ->get();
    }

    public function getByCarModelId($carModelId,$skip,$take)
    {
        return $this->model::where(Contract::CAR_MODEL_ID,$carModelId)
            ->skip($skip)
            ->take($take)
            ->get();
    }

    public function getByCarBrandId($carBrandId,$skip,$take)
    {
        return $this->model::where(Contract::CAR_BRAND_ID,$carBrandId)
            ->skip($skip)
            ->take($take)
            ->get();
    }

    public function getByEmail($email)
    {
        return $this->model::where(Contract::EMAIL,$email)
            ->first();
    }

    public function create($data)
    {
        return $this->model::create($data);
    }

    public function update($id,$data)
    {
        $this->model::where(Contract::ID,$id)->update($data);
    }

    public function all()
    {
        return $this->model::get();
    }

}
