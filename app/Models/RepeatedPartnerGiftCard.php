<?php

namespace App\Models;

use App\Domain\Contracts\RepeatedPartnerGiftCardContract;
use App\Domain\Scopes\OrderBy;
use App\Domain\Scopes\WithDeleted;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RepeatedPartnerGiftCard extends Model
{
    use HasFactory;

    protected $table    =   RepeatedPartnerGiftCardContract::TABLE;
    protected $fillable =   RepeatedPartnerGiftCardContract::FILLABLE;

    protected static function booted(): void
    {
        static::addGlobalScope(new OrderBy);
        static::addGlobalScope(new WithDeleted);
    }

    public function card(): BelongsTo
    {
        return $this->belongsTo(Card::class);
    }

    public function partner(): BelongsTo
    {
        return $this->belongsTo(Partner::class);
    }
}
