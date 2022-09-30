<?php

namespace App\Models;

use App\Domain\Contracts\CardCategoryContract;
use App\Domain\Scopes\OrderBy;
use App\Domain\Scopes\WithDeleted;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CardCategory extends Model
{
    use HasFactory;

    protected $table    =   CardCategoryContract::TABLE;
    protected $fillable =   CardCategoryContract::FILLABLE;

    protected static function booted(): void
    {
        static::addGlobalScope(new OrderBy);
        static::addGlobalScope(new WithDeleted);
    }
}
