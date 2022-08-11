<?php

namespace App\Models;

use App\Domain\Contracts\RegionContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;
    protected $table    =   RegionContract::TABLE;
    protected $fillable =   RegionContract::FILLABLE;
}
