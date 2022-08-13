<?php

namespace App\Models;

use App\Domain\Contracts\ServiceTypeContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceType extends Model
{
    use HasFactory;
    protected $table    =   ServiceTypeContract::TABLE;
    protected $fillable =   ServiceTypeContract::FILLABLE;
}
