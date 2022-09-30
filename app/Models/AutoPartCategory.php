<?php

namespace App\Models;

use App\Domain\Contracts\AutoPartCategoryContract;
use App\Domain\Scopes\OrderBy;
use App\Domain\Scopes\WithDeleted;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AutoPartCategory extends Model
{
    use HasFactory;

    protected $table    =   AutoPartCategoryContract::TABLE;
    protected $fillable =   AutoPartCategoryContract::FILLABLE;

    protected static function booted(): void
    {
        static::addGlobalScope(new OrderBy);
        static::addGlobalScope(new WithDeleted);
    }

}
