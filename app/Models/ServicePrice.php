<?php

namespace App\Models;

use App\Domain\Contracts\ServicePriceContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicePrice extends Model
{
    use HasFactory;
    protected $table    =   ServicePriceContract::TABLE;
    protected $fillable =   ServicePriceContract::FILLABLE;
}
