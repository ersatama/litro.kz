<?php

namespace App\Models;

use App\Domain\Contracts\LawyerContactAccessContract;
use App\Domain\Scopes\OrderBy;
use App\Domain\Scopes\WithDeleted;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LawyerContactAccess extends Model
{
    use HasFactory;
    protected $table    =   LawyerContactAccessContract::TABLE;
    protected $fillable =   LawyerContactAccessContract::FILLABLE;

    protected static function booted(): void
    {
        static::addGlobalScope(new OrderBy);
        static::addGlobalScope(new WithDeleted);
    }

    public function lawyer(): BelongsTo
    {
        return $this->belongsTo(Lawyer::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}