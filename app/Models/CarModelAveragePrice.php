<?php

namespace App\Models;

use App\Domain\Contracts\CarModelAveragePriceContract;
use App\Domain\Scopes\OrderBy;
use App\Domain\Scopes\WithDeleted;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CarModelAveragePrice extends Model
{
    use HasFactory;

    protected $table    =   CarModelAveragePriceContract::TABLE;
    protected $fillable =   CarModelAveragePriceContract::FILLABLE;

    protected static function booted(): void
    {
        static::addGlobalScope(new OrderBy);
        static::addGlobalScope(new WithDeleted);
    }

    public function car_model(): BelongsTo
    {
        return $this->belongsTo(CarModel::class);
    }
}
