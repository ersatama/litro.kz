<?php

namespace App\Http\Resources\News;

use App\Domain\Contracts\Contract;
use App\Domain\Contracts\NewsContract;
use App\Http\Resources\Image\ImageResource;
use App\Http\Resources\NewsCategory\NewsCategoryResource;
use Illuminate\Http\Resources\Json\JsonResource;

class NewsResource extends JsonResource
{
    public function toArray($request):array
    {
        $arr    =   [
            Contract::ID    =>  $this->{Contract::ID},
            Contract::CREATED_AT    =>  $this->{Contract::CREATED_AT},
            Contract::UPDATED_AT    =>  $this->{Contract::UPDATED_AT},
            Contract::IMAGE =>  new ImageResource($this->{Contract::IMAGE}),
            Contract::NEWS_CATEGORY =>  new NewsCategoryResource($this->{Contract::NEWS_CATEGORY})
        ];
        foreach (NewsContract::FILLABLE as &$value) {
            $arr[$value]    =   $this->{$value};
        }
        return Contract::CLEAR($arr);
    }
}
