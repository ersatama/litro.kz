<?php

namespace App\Models;

use App\Domain\Contracts\AutoPartTypeContract;
use App\Domain\Scopes\OrderBy;
use App\Domain\Scopes\WithDeleted;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AutoPartType extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;

    protected $table    =   AutoPartTypeContract::TABLE;
    protected $fillable =   AutoPartTypeContract::FILLABLE;

    protected static function booted(): void
    {
        static::addGlobalScope(new OrderBy);
        static::addGlobalScope(new WithDeleted);
    }
}
