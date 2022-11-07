<?php

namespace App\Models;

use App\Domain\Contracts\UserProfileContract;
use App\Domain\Scopes\OrderBy;
use App\Domain\Scopes\WithDeleted;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserProfile extends Model
{
    use CrudTrait, HasFactory;

    protected $table    =   UserProfileContract::TABLE;
    protected $fillable =   UserProfileContract::FILLABLE;

    protected static function booted(): void
    {
        static::addGlobalScope(new OrderBy);
        static::addGlobalScope(new WithDeleted);
    }

    public function image(): BelongsTo
    {
        return $this->belongsTo(Image::class);
    }
}
