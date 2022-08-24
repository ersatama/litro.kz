<?php

namespace App\Http\Resources\OrderCard;

use App\Domain\Contracts\MainContract;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderCardResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            MainContract::ID    =>  $this->{MainContract::ID},
            MainContract::CARD_ID   =>  $this->{MainContract::CARD_ID},
            MainContract::USER_ID   =>  $this->{MainContract::USER_ID},
            MainContract::BITRIX_ID =>  $this->{MainContract::BITRIX_ID},
            MainContract::SYNCED    =>  $this->{MainContract::SYNCED},
            MainContract::PRICE =>  $this->{MainContract::PRICE},
            MainContract::START_DATE    =>  $this->{MainContract::START_DATE},
            MainContract::END_DATE  =>  $this->{MainContract::END_DATE},
            MainContract::NUMBER    =>  $this->{MainContract::NUMBER},
            MainContract::PAYMENT_TYPE  =>  $this->{MainContract::PAYMENT_TYPE},
            MainContract::PAYBOX_ORDER_ID   =>  $this->{MainContract::PAYBOX_ORDER_ID},
            MainContract::PAYBOX_ORDER_DATE =>  $this->{MainContract::PAYBOX_ORDER_DATE},
            MainContract::STATUS    =>  $this->{MainContract::STATUS},
            MainContract::REFERRAL  =>  $this->{MainContract::REFERRAL},
            MainContract::RECURRENT_ENABLED =>  $this->{MainContract::RECURRENT_ENABLED},
            MainContract::IS_PAYED  =>  $this->{MainContract::IS_PAYED},
            MainContract::IS_CANCELED   =>  $this->{MainContract::IS_CANCELED},
            MainContract::MONTHLY   =>  $this->{MainContract::MONTHLY},
            MainContract::IS_FROM_EXCEL =>  $this->{MainContract::IS_FROM_EXCEL},
            MainContract::ACTIVATE_DATE =>  $this->{MainContract::ACTIVATE_DATE},
            MainContract::PAYMENT_METHOD    =>  $this->{MainContract::PAYMENT_METHOD},
            MainContract::UTM_CAMPAIGN  =>  $this->{MainContract::UTM_CAMPAIGN},
            MainContract::IMPORT_ID =>  $this->{MainContract::IMPORT_ID},
            MainContract::CREATED_AT    =>  $this->{MainContract::CREATED_AT},
            MainContract::UPDATED_AT    =>  $this->{MainContract::UPDATED_AT}
        ];
    }
}
