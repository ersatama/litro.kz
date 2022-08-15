<?php

namespace App\Http\Resources\News;

use App\Domain\Contracts\MainContract;
use Illuminate\Http\Resources\Json\JsonResource;

class NewsResource extends JsonResource
{
    public function toArray($request):array
    {
        return [
            MainContract::ID    =>  $this->{MainContract::ID},
            MainContract::TITLE =>  $this->{MainContract::TITLE},
            MainContract::TITLE_KZ  =>  $this->{MainContract::TITLE_KZ},
            MainContract::TITLE_EN  =>  $this->{MainContract::TITLE_EN},
            MainContract::DESCRIPTION   =>  $this->{MainContract::DESCRIPTION},
            MainContract::DESCRIPTION_KZ    =>  $this->{MainContract::DESCRIPTION_KZ},
            MainContract::DESCRIPTION_EN    =>  $this->{MainContract::DESCRIPTION_EN},
            MainContract::IMAGE_ID  =>  $this->{MainContract::IMAGE_ID},
            MainContract::NEWS_CATEGORY_ID  =>  $this->{MainContract::NEWS_CATEGORY_ID},
            MainContract::IS_ACTIVE =>  $this->{MainContract::IS_ACTIVE},
            MainContract::LINK  =>  $this->{MainContract::LINK},
            MainContract::CREATED_AT    =>  $this->{MainContract::CREATED_AT},
            MainContract::UPDATED_AT    =>  $this->{MainContract::UPDATED_AT},
        ];
    }
}
