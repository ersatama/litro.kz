<?php

namespace App\Domain\Services;

use App\Domain\Repositories\ThirdPartyApp\ThirdPartyAppRepositoryInterface;

class ThirdPartyAppService extends MainService
{
    public ThirdPartyAppRepositoryInterface $thirdPartyAppRepository;
    public function __construct(ThirdPartyAppRepositoryInterface $thirdPartyAppRepository)
    {
        $this->thirdPartyAppRepository  =   $thirdPartyAppRepository;
    }
}
