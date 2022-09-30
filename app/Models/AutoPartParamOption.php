<?php

namespace App\Models;

use App\Domain\Contracts\AutoPartParamOptionContract;
use App\Domain\Scopes\OrderBy;
use App\Domain\Scopes\WithDeleted;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AutoPartParamOption extends Model
{
    use HasFactory;

    protected $table    =   AutoPartParamOptionContract::TABLE;
    protected $fillable =   AutoPartParamOptionContract::FILLABLE;

    protected static function booted(): void
    {
        static::addGlobalScope(new OrderBy);
        static::addGlobalScope(new WithDeleted);
    }

    public function auto_part_param(): BelongsTo
    {
        return $this->belongsTo(AutoPartParam::class);
    }
}
