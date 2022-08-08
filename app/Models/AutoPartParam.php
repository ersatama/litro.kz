<?php

namespace App\Models;

use App\Domain\Contracts\AutoPartParamContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AutoPartParam extends Model
{
    use HasFactory;
    protected $table    =   AutoPartParamContract::TABLE;
    protected $fillable =   AutoPartParamContract::FILLABLE;
}
