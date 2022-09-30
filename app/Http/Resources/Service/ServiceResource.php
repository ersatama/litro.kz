<?php

namespace App\Http\Resources\Service;

use App\Domain\Contracts\Contract;
use Illuminate\Http\Resources\Json\JsonResource;

class ServiceResource extends JsonResource
{
    public function toArray($request):array
    {
        return [
            Contract::ID    =>  $this->{Contract::ID},
            Contract::TITLE =>  $this->{Contract::TITLE},
            Contract::TITLE_EN  =>  $this->{Contract::TITLE_EN},
            Contract::TITLE_KZ  =>  $this->{Contract::TITLE_KZ},
            Contract::VIEW  =>  $this->{Contract::VIEW},
            Contract::VIEW_EN   =>  $this->{Contract::VIEW_EN},
            Contract::VIEW_KZ   =>  $this->{Contract::VIEW_KZ},
            Contract::DESCRIPTION   =>  $this->{Contract::DESCRIPTION},
            Contract::DESCRIPTION_EN    =>  $this->{Contract::DESCRIPTION_EN},
            Contract::DESCRIPTION_KZ    =>  $this->{Contract::DESCRIPTION_KZ},
            Contract::TAGLINE   =>  $this->{Contract::TAGLINE},
            Contract::TAGLINE_EN    =>  $this->{Contract::TAGLINE_EN},
            Contract::TAGLINE_KZ    =>  $this->{Contract::TAGLINE_KZ},
            Contract::ANNOTATION    =>  $this->{Contract::ANNOTATION},
            Contract::ANNOTATION_EN =>  $this->{Contract::ANNOTATION_EN},
            Contract::ANNOTATION_KZ =>  $this->{Contract::ANNOTATION_KZ},
            Contract::SERVICE_TYPE_ID   =>  $this->{Contract::SERVICE_TYPE_ID},
            Contract::IS_ACTIVE =>  $this->{Contract::IS_ACTIVE},
            Contract::URL   =>  $this->{Contract::URL},
            Contract::PRICE =>  $this->{Contract::PRICE},
            Contract::CARD_PRICE    =>  $this->{Contract::CARD_PRICE},
            Contract::SELECTABLE    =>  $this->{Contract::SELECTABLE},
            Contract::WITHOUT_CARD  =>  $this->{Contract::WITHOUT_CARD},
            Contract::WITH_CARD =>  $this->{Contract::WITH_CARD},
            Contract::NOTE_STARS    =>  $this->{Contract::NOTE_STARS},
            Contract::IS_CORPORATE  =>  $this->{Contract::IS_CORPORATE},
            Contract::IMAGE_ID  =>  $this->{Contract::IMAGE_ID},
            Contract::BROWSER_IMAGE_ID  =>  $this->{Contract::BROWSER_IMAGE_ID},
            Contract::ADDITIONAL_IMAGE_ID   =>  $this->{Contract::ADDITIONAL_IMAGE_ID},
            Contract::CREATED_AT    =>  $this->{Contract::CREATED_AT},
            Contract::UPDATED_AT    =>  $this->{Contract::UPDATED_AT},
        ];
    }
}
