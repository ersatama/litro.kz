<?php

namespace App\Models;

use App\Domain\Contracts\CountryContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $table    =   CountryContract::TABLE;
    protected $fillable =   CountryContract::FILLABLE;
}
