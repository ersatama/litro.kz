<?php

namespace App\Models;

use App\Domain\Contracts\CarModelContract;
use App\Domain\Scopes\OrderBy;
use App\Domain\Scopes\WithDeleted;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CarModel extends Model
{
    use HasFactory;

    protected $table    =   CarModelContract::TABLE;
    protected $fillable =   CarModelContract::FILLABLE;

    protected static function booted(): void
    {
        static::addGlobalScope(new OrderBy);
        static::addGlobalScope(new WithDeleted);
    }

    public function car_brand(): BelongsTo
    {
        return $this->belongsTo(CarBrand::class);
    }

}
