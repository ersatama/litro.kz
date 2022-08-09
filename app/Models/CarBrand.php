<?php

namespace App\Models;

use App\Domain\Contracts\CarBrandContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarBrand extends Model
{
    use HasFactory;
    protected $table    =   CarBrandContract::TABLE;
    protected $fillable =   CarBrandContract::FILLABLE;
}
