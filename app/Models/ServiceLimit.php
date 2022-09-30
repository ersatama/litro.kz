<?php

namespace App\Models;

use App\Domain\Contracts\ServiceLimitContract;
use App\Domain\Scopes\OrderBy;
use App\Domain\Scopes\WithDeleted;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ServiceLimit extends Model
{
    use HasFactory;

    protected $table    =   ServiceLimitContract::TABLE;
    protected $fillable =   ServiceLimitContract::FILLABLE;

    protected static function booted(): void
    {
        static::addGlobalScope(new OrderBy);
        static::addGlobalScope(new WithDeleted);
    }

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

    public function card(): BelongsTo
    {
        return $this->belongsTo(Card::class);
    }
}
