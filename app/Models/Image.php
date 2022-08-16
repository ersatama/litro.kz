<?php

namespace App\Models;

use App\Domain\Contracts\ImageContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $table    =   ImageContract::TABLE;
    protected $fillable =   ImageContract::FILLABLE;
}
