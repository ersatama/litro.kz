<?php

namespace App\Models;

use App\Domain\Contracts\SPartnerPointRequisiteContract;
use App\Domain\Scopes\OrderBy;
use App\Domain\Scopes\WithDeleted;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SPartnerPointRequisite extends Model
{
    use HasFactory;

    protected $table    =   SPartnerPointRequisiteContract::TABLE;
    protected $fillable =   SPartnerPointRequisiteContract::FILLABLE;

    protected static function booted(): void
    {
        static::addGlobalScope(new OrderBy);
        static::addGlobalScope(new WithDeleted);
    }

    public function s_partner_point(): BelongsTo
    {
        return $this->belongsTo(SPartnerPoint::class);
    }

}
