<?php

namespace App\Domain\Repositories\Code;

use App\Domain\Repositories\RepositoryEloquent;
use App\Models\Code;

class CodeRepositoryEloquent implements CodeRepositoryInterface
{
    use RepositoryEloquent;
    protected Code $model;
    public function __construct(Code $code)
    {
        $this->model    =   $code;
    }
}
