<?php

namespace App\Http\Resources\Service;

use App\Domain\Contracts\MainContract;
use Illuminate\Http\Resources\Json\JsonResource;

class ServiceResource extends JsonResource
{
    public function toArray($request):array
    {
        return [
            MainContract::ID    =>  $this->{MainContract::ID},
            MainContract::TITLE =>  $this->{MainContract::TITLE},
            MainContract::TITLE_EN  =>  $this->{MainContract::TITLE_EN},
            MainContract::TITLE_KZ  =>  $this->{MainContract::TITLE_KZ},
            MainContract::VIEW  =>  $this->{MainContract::VIEW},
            MainContract::VIEW_EN   =>  $this->{MainContract::VIEW_EN},
            MainContract::VIEW_KZ   =>  $this->{MainContract::VIEW_KZ},
            MainContract::DESCRIPTION   =>  $this->{MainContract::DESCRIPTION},
            MainContract::DESCRIPTION_EN    =>  $this->{MainContract::DESCRIPTION_EN},
            MainContract::DESCRIPTION_KZ    =>  $this->{MainContract::DESCRIPTION_KZ},
            MainContract::TAGLINE   =>  $this->{MainContract::TAGLINE},
            MainContract::TAGLINE_EN    =>  $this->{MainContract::TAGLINE_EN},
            MainContract::TAGLINE_KZ    =>  $this->{MainContract::TAGLINE_KZ},
            MainContract::ANNOTATION    =>  $this->{MainContract::ANNOTATION},
            MainContract::ANNOTATION_EN =>  $this->{MainContract::ANNOTATION_EN},
            MainContract::ANNOTATION_KZ =>  $this->{MainContract::ANNOTATION_KZ},
            MainContract::SERVICE_TYPE_ID   =>  $this->{MainContract::SERVICE_TYPE_ID},
            MainContract::IS_ACTIVE =>  $this->{MainContract::IS_ACTIVE},
            MainContract::URL   =>  $this->{MainContract::URL},
            MainContract::PRICE =>  $this->{MainContract::PRICE},
            MainContract::CARD_PRICE    =>  $this->{MainContract::CARD_PRICE},
            MainContract::SELECTABLE    =>  $this->{MainContract::SELECTABLE},
            MainContract::WITHOUT_CARD  =>  $this->{MainContract::WITHOUT_CARD},
            MainContract::WITH_CARD =>  $this->{MainContract::WITH_CARD},
            MainContract::NOTE_STARS    =>  $this->{MainContract::NOTE_STARS},
            MainContract::IS_CORPORATE  =>  $this->{MainContract::IS_CORPORATE},
            MainContract::IMAGE_ID  =>  $this->{MainContract::IMAGE_ID},
            MainContract::BROWSER_IMAGE_ID  =>  $this->{MainContract::BROWSER_IMAGE_ID},
            MainContract::ADDITIONAL_IMAGE_ID   =>  $this->{MainContract::ADDITIONAL_IMAGE_ID},
            MainContract::CREATED_AT    =>  $this->{MainContract::CREATED_AT},
            MainContract::UPDATED_AT    =>  $this->{MainContract::UPDATED_AT},
        ];
    }
}
