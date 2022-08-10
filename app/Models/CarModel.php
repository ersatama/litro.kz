<?php

namespace App\Models;

use App\Domain\Contracts\CarModelContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    use HasFactory;
    protected $table    =   CarModelContract::TABLE;
    protected $fillable =   CarModelContract::FILLABLE;
}
