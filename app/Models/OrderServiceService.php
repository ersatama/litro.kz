<?php

namespace App\Models;

use App\Domain\Contracts\OrderServiceServiceContract;
use App\Domain\Scopes\OrderBy;
use App\Domain\Scopes\WithDeleted;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderServiceService extends Model
{
    use HasFactory;

    protected $table    =   OrderServiceServiceContract::TABLE;
    protected $fillable =   OrderServiceServiceContract::FILLABLE;

    protected static function booted(): void
    {
        static::addGlobalScope(new OrderBy);
        static::addGlobalScope(new WithDeleted);
    }

    public function order_service(): BelongsTo
    {
        return $this->belongsTo(OrderService::class);
    }

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }
}
