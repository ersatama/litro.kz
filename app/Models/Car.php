<?php

namespace App\Models;

use App\Domain\Contracts\CarContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $table    =   CarContract::TABLE;
    protected $fillable =   CarContract::FILLABLE;
}
