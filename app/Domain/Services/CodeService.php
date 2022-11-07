<?php

namespace App\Domain\Services;

use App\Domain\Repositories\Code\CodeRepositoryInterface;

class CodeService extends MainService
{
    public CodeRepositoryInterface $codeRepository;
    public function __construct(CodeRepositoryInterface $codeRepository)
    {
        $this->codeRepository   =   $codeRepository;
    }
}
