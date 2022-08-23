<?php

namespace App\Models;

use App\Domain\Contracts\DriverContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;
    protected $table    =   DriverContract::TABLE;
    protected $fillable =   DriverContract::FILLABLE;
}
