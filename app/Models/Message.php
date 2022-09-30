<?php

namespace App\Models;

use App\Domain\Contracts\MessageContract;
use App\Domain\Scopes\OrderBy;
use App\Domain\Scopes\WithDeleted;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $table    =   MessageContract::TABLE;
    protected $fillable =   MessageContract::FILLABLE;

    protected static function booted(): void
    {
        static::addGlobalScope(new OrderBy);
        static::addGlobalScope(new WithDeleted);
    }
}
