<?php

namespace App\Domain\Services;

use App\Domain\Repositories\Role\RoleRepositoryInterface;

class RoleService extends MainService
{
    public RoleRepositoryInterface $roleRepository;
    public function __construct(RoleRepositoryInterface $roleRepository)
    {
        $this->roleRepository   =   $roleRepository;
    }
}
