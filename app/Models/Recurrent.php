<?php

namespace App\Models;

use App\Domain\Contracts\RecurrentContract;
use App\Domain\Scopes\OrderBy;
use App\Domain\Scopes\WithDeleted;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recurrent extends Model
{
    use HasFactory;

    protected $table    =   RecurrentContract::TABLE;
    protected $fillable =   RecurrentContract::FILLABLE;

    protected static function booted(): void
    {
        static::addGlobalScope(new OrderBy);
        static::addGlobalScope(new WithDeleted);
    }
}
