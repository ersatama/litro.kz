<?php

namespace App\Models;

use App\Domain\Contracts\TransactionToNonExistingUserContract;
use App\Domain\Scopes\OrderBy;
use App\Domain\Scopes\WithDeleted;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionToNonExistingUser extends Model
{
    use HasFactory;

    protected $table    =   TransactionToNonExistingUserContract::TABLE;
    protected $fillable =   TransactionToNonExistingUserContract::FILLABLE;

    protected static function booted(): void
    {
        static::addGlobalScope(new OrderBy);
        static::addGlobalScope(new WithDeleted);
    }
}
