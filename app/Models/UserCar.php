<?php

namespace App\Models;

use App\Domain\Contracts\UserCarContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCar extends Model
{
    use HasFactory;
    protected $table    =   UserCarContract::TABLE;
    protected $fillable =   UserCarContract::FILLABLE;
}
