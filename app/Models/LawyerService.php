<?php

namespace App\Models;

use App\Domain\Contracts\LawyerServiceContract;
use App\Domain\Scopes\OrderBy;
use App\Domain\Scopes\WithDeleted;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LawyerService extends Model
{
    use HasFactory;
    protected $table    =   LawyerServiceContract::TABLE;
    protected $fillable =   LawyerServiceContract::FILLABLE;

    protected static function booted(): void
    {
        static::addGlobalScope(new OrderBy);
        static::addGlobalScope(new WithDeleted);
    }

}
