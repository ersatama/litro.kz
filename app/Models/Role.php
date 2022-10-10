<?php

namespace App\Models;

use App\Domain\Contracts\RoleContract;
use App\Domain\Scopes\OrderBy;
use App\Domain\Scopes\WithDeleted;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\app\Models\Traits\CrudTrait;

class Role extends Model
{
    use HasFactory, CrudTrait;

    protected $table    =   RoleContract::TABLE;
    protected $fillable =   RoleContract::FILLABLE;

    protected static function booted(): void
    {
        static::addGlobalScope(new OrderBy);
        static::addGlobalScope(new WithDeleted);
    }
}
