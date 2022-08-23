<?php

namespace App\Models;

use App\Domain\Contracts\CodeContract;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Code extends Model
{
    use HasFactory;
    protected $table    =   CodeContract::TABLE;
    protected $fillable =   CodeContract::FILLABLE;

    public function code(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => intval($value),
        );
    }
}
