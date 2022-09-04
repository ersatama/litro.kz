<?php

namespace App\Models;

use App\Domain\Contracts\PlaceContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;
    protected $table    =   PlaceContract::TABLE;
    protected $fillable =   PlaceContract::FILLABLE;
}
