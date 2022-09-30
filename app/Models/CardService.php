<?php

namespace App\Models;

use App\Domain\Contracts\CardServiceContract;
use App\Domain\Scopes\OrderBy;
use App\Domain\Scopes\WithDeleted;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CardService extends Model
{
    use HasFactory;

    protected $table    =   CardServiceContract::TABLE;
    protected $fillable =   CardServiceContract::FILLABLE;

    protected static function booted(): void
    {
        static::addGlobalScope(new OrderBy);
        static::addGlobalScope(new WithDeleted);
    }

    public function card(): BelongsTo
    {
        return $this->belongsTo(Card::class);
    }

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }
}
