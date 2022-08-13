<?php

namespace App\Models;

use App\Domain\Contracts\ServiceContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $table    =   ServiceContract::TABLE;
    protected $fillable =   ServiceContract::FILLABLE;
}
