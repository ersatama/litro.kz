<?php

namespace App\Models;

use App\Domain\Contracts\SPartnerReceivedServiceContract;
use App\Domain\Scopes\OrderBy;
use App\Domain\Scopes\WithDeleted;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SPartnerReceivedService extends Model
{
    use HasFactory;

    protected $table    =   SPartnerReceivedServiceContract::TABLE;
    protected $fillable =   SPartnerReceivedServiceContract::FILLABLE;

    protected static function booted(): void
    {
        static::addGlobalScope(new OrderBy);
        static::addGlobalScope(new WithDeleted);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function currency(): BelongsTo
    {
        return $this->belongsTo(Currency::class);
    }

    public function s_partner_point(): BelongsTo
    {
        return $this->belongsTo(SPartnerPoint::class);
    }
}
