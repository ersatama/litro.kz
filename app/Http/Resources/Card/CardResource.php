<?php

namespace App\Http\Resources\Card;

use App\Domain\Contracts\MainContract;
use Illuminate\Http\Resources\Json\JsonResource;

class CardResource extends JsonResource
{
    public function toArray($request) :array
    {
        return [
            MainContract::ID    =>  $this->{MainContract::ID},
            MainContract::CATEGORY_ID   =>  $this->{MainContract::CATEGORY_ID},
            MainContract::IMAGE_ID  =>  $this->{MainContract::IMAGE_ID},
            MainContract::TITLE =>  $this->{MainContract::TITLE},
            MainContract::TITLE_KZ  =>  $this->{MainContract::TITLE_KZ},
            MainContract::TITLE_EN  =>  $this->{MainContract::TITLE_EN},
            MainContract::DESCRIPTION   =>  $this->{MainContract::DESCRIPTION},
            MainContract::DESCRIPTION_KZ    =>  $this->{MainContract::DESCRIPTION_KZ},
            MainContract::DESCRIPTION_EN    =>  $this->{MainContract::DESCRIPTION_EN},
            MainContract::DETAIL   =>  $this->{MainContract::DETAIL},
            MainContract::DETAIL_KZ =>  $this->{MainContract::DETAIL_KZ},
            MainContract::DETAIL_EN =>  $this->{MainContract::DETAIL_EN},
            MainContract::PRICE =>  $this->{MainContract::PRICE},
            MainContract::RANK  =>  $this->{MainContract::RANK},
            MainContract::ALLOWED_DRIVERS   =>  $this->{MainContract::ALLOWED_DRIVERS},
            MainContract::ALLOWED_CARS  =>  $this->{MainContract::ALLOWED_CARS},
            MainContract::IS_ACTIVE =>  $this->{MainContract::IS_ACTIVE},
            MainContract::CLIENT_DISCOUNT   =>  $this->{MainContract::CLIENT_DISCOUNT},
            MainContract::PRICE_MONTHLY =>  $this->{MainContract::PRICE_MONTHLY},
            MainContract::PRICE_MONTHLY_FIRST_MONTH =>  $this->{MainContract::PRICE_MONTHLY_FIRST_MONTH},
            MainContract::REFERRAL_PRICE_MONTHLY    =>  $this->{MainContract::REFERRAL_PRICE_MONTHLY},
            MainContract::REFERRAL_PRICE_MONTHLY_FIRST_MONTH    =>  $this->{MainContract::REFERRAL_PRICE_MONTHLY_FIRST_MONTH},
            MainContract::IS_FOR_CORPORATE_USE  =>  $this->{MainContract::IS_FOR_CORPORATE_USE},
            MainContract::ICON  =>  $this->{MainContract::ICON},
            MainContract::IMAGE =>  $this->{MainContract::IMAGE},
            MainContract::COLORS    =>  $this->{MainContract::COLORS},
            MainContract::CREATED_AT    =>  $this->{MainContract::CREATED_AT},
            MainContract::UPDATED_AT    =>  $this->{MainContract::UPDATED_AT},
        ];
    }
}
