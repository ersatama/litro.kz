<?php

namespace App\Models;

use App\Domain\Contracts\CarModelAveragePriceContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarModelAveragePrice extends Model
{
    use HasFactory;
    protected $table    =   CarModelAveragePriceContract::TABLE;
    protected $fillable =   CarModelAveragePriceContract::FILLABLE;
}
