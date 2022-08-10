<?php

namespace App\Models;

use App\Domain\Contracts\CityContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $table    =   CityContract::TABLE;
    protected $fillable =   CityContract::FILLABLE;
}
