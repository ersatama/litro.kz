<?php

namespace App\Models;

use App\Domain\Contracts\NotificationUserContract;
use App\Domain\Scopes\OrderBy;
use App\Domain\Scopes\WithDeleted;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class NotificationUser extends Model
{
    use HasFactory, CrudTrait;
    protected $table    =   NotificationUserContract::TABLE;
    protected $fillable =   NotificationUserContract::FILLABLE;

    protected static function booted(): void
    {
        static::addGlobalScope(new OrderBy);
        static::addGlobalScope(new WithDeleted);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
