<?php

namespace App\Models;

use App\Domain\Contracts\LawyerServicePivotContract;
use App\Domain\Scopes\OrderBy;
use App\Domain\Scopes\WithDeleted;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LawyerServicePivot extends Model
{
    use HasFactory;

    protected $table    =   LawyerServicePivotContract::TABLE;
    protected $fillable =   LawyerServicePivotContract::FILLABLE;

    protected static function booted(): void
    {
        static::addGlobalScope(new OrderBy);
        static::addGlobalScope(new WithDeleted);
    }

    public function lawyer(): BelongsTo
    {
        return $this->belongsTo(Lawyer::class);
    }

    public function lawyer_service(): BelongsTo
    {
        return $this->belongsTo(LawyerService::class);
    }
}
