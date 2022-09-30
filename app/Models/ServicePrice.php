<?php

namespace App\Models;

use App\Domain\Contracts\ServicePriceContract;
use App\Domain\Scopes\OrderBy;
use App\Domain\Scopes\WithDeleted;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ServicePrice extends Model
{
    use HasFactory;

    protected $table    =   ServicePriceContract::TABLE;
    protected $fillable =   ServicePriceContract::FILLABLE;

    protected static function booted(): void
    {
        static::addGlobalScope(new OrderBy);
        static::addGlobalScope(new WithDeleted);
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

    public function car_category(): BelongsTo
    {
        return $this->belongsTo(CarCategory::class);
    }
}
