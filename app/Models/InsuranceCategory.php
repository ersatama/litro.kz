<?php

namespace App\Models;

use App\Domain\Contracts\InsuranceCategoryContract;
use App\Domain\Scopes\OrderBy;
use App\Domain\Scopes\WithDeleted;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InsuranceCategory extends Model
{
    use HasFactory;
    protected $table    =   InsuranceCategoryContract::TABLE;
    protected $fillable =   InsuranceCategoryContract::FILLABLE;

    protected static function booted(): void
    {
        static::addGlobalScope(new OrderBy);
        static::addGlobalScope(new WithDeleted);
    }

}
