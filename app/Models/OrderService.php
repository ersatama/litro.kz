<?php

namespace App\Models;

use App\Domain\Contracts\OrderServiceContract;
use App\Domain\Scopes\OrderBy;
use App\Domain\Scopes\WithDeleted;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderService extends Model
{
    use HasFactory;

    protected $table    =   OrderServiceContract::TABLE;
    protected $fillable =   OrderServiceContract::FILLABLE;

    protected static function booted(): void
    {
        static::addGlobalScope(new OrderBy);
        static::addGlobalScope(new WithDeleted);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function order_card(): BelongsTo
    {
        return $this->belongsTo(OrderCard::class);
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function place(): BelongsTo
    {
        return $this->belongsTo(Place::class);
    }

    public function car_category(): BelongsTo
    {
        return $this->belongsTo(CarCategory::class);
    }
}
