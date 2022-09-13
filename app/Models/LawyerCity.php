<?php

namespace App\Models;

use App\Domain\Contracts\LawyerCityContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LawyerCity extends Model
{
    use HasFactory;
    protected $table    =   LawyerCityContract::TABLE;
    protected $fillable =   LawyerCityContract::FILLABLE;
}
