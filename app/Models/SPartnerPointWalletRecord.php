<?php

namespace App\Models;

use App\Domain\Contracts\SPartnerPointWalletRecordContract;
use App\Domain\Scopes\OrderBy;
use App\Domain\Scopes\WithDeleted;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SPartnerPointWalletRecord extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;

    protected $table    =   SPartnerPointWalletRecordContract::TABLE;
    protected $fillable =   SPartnerPointWalletRecordContract::FILLABLE;

    protected static function booted(): void
    {
        static::addGlobalScope(new OrderBy);
        static::addGlobalScope(new WithDeleted);
    }

    public function s_partner_point_wallet(): BelongsTo
    {
        return $this->belongsTo(SPartnerPointWallet::class);
    }

    public function s_partner_received_service(): BelongsTo
    {
        return $this->belongsTo(SPartnerReceivedService::class);
    }
}
