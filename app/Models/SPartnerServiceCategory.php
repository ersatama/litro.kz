<?php

namespace App\Models;

use App\Domain\Contracts\SPartnerServiceCategoryContract;
use App\Domain\Scopes\OrderBy;
use App\Domain\Scopes\WithDeleted;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SPartnerServiceCategory extends Model
{
    use HasFactory;

    protected $table    =   SPartnerServiceCategoryContract::TABLE;
    protected $fillable =   SPartnerServiceCategoryContract::FILLABLE;

    protected static function booted(): void
    {
        static::addGlobalScope(new OrderBy);
        static::addGlobalScope(new WithDeleted);
    }
}
