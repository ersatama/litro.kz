<?php

namespace App\Domain\Scopes;

use App\Domain\Contracts\Contract;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class WithDeleted implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param Builder $builder
     * @param Model $model
     * @return void
     */
    public function apply(Builder $builder, Model $model): void
    {
        $builder->where(Contract::DELETED_AT,null);
        if (request()->has(Contract::WITH_DELETED)) {
            $builder->orWhere(Contract::DELETED_AT,'!=',null);
        }
    }
}
