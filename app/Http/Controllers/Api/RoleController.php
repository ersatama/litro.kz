<?php

namespace App\Http\Controllers\Api;

use App\Domain\Services\RoleService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    protected RoleService $roleService;
    public function __construct(RoleService $roleService)
    {
        $this->roleService  =   $roleService;
    }
}
