<?php

namespace App\Domain\Repositories\Code;

use App\Domain\Repositories\MainRepositoryEloquent;
use App\Models\Code;

class CodeRepositoryEloquent implements CodeRepositoryInterface
{
    use MainRepositoryEloquent;
    protected Code $model;
    public function __construct(Code $code)
    {
        $this->model    =   $code;
    }
}
