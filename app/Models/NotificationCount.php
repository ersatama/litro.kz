<?php

namespace App\Models;

use App\Domain\Contracts\NotificationCountContract;
use App\Domain\Scopes\OrderBy;
use App\Domain\Scopes\WithDeleted;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotificationCount extends Model
{
    use HasFactory;

    protected $table    =   NotificationCountContract::TABLE;
    protected $fillable =   NotificationCountContract::FILLABLE;

    protected static function booted(): void
    {
        static::addGlobalScope(new OrderBy);
        static::addGlobalScope(new WithDeleted);
    }
}
