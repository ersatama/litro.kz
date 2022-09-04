<?php

namespace App\Models;

use App\Domain\Contracts\RecurrentContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recurrent extends Model
{
    use HasFactory;
    protected $table    =   RecurrentContract::TABLE;
    protected $fillable =   RecurrentContract::FILLABLE;
}
