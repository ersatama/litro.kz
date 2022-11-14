<?php

namespace App\Models;

use App\Domain\Contracts\OrderCardChosenServiceContract;
use App\Domain\Scopes\OrderBy;
use App\Domain\Scopes\WithDeleted;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderCardChosenService extends Model
{
    use HasFactory;

    protected $table    =   OrderCardChosenServiceContract::TABLE;
    protected $fillable =   OrderCardChosenServiceContract::FILLABLE;

    protected static function booted(): void
    {
        static::addGlobalScope(new OrderBy);
        static::addGlobalScope(new WithDeleted);
    }

    public function order_card(): BelongsTo
    {
        return $this->belongsTo(OrderCard::class);
    }

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }
}
