<?php

namespace App\Domain\Repositories\AutoPartType;

use App\Models\AutoPartType;

class AutoPartTypeRepositoryEloquent implements AutoPartTypeRepositoryInterface
{
    public function get()
    {
        return AutoPartType::get();
    }
}
