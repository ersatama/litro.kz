<?php

namespace App\Models;

use App\Domain\Contracts\CodeContract;
use App\Domain\Scopes\OrderBy;
use App\Domain\Scopes\WithDeleted;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Code extends Model
{
    use HasFactory;

    protected $table    =   CodeContract::TABLE;
    protected $fillable =   CodeContract::FILLABLE;

    protected static function booted(): void
    {
        static::addGlobalScope(new OrderBy);
        static::addGlobalScope(new WithDeleted);
    }

    public function code(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => intval($value),
        );
    }
}
