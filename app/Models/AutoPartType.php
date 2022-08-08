<?php

namespace App\Models;

use App\Domain\Contracts\AutoPartTypeContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AutoPartType extends Model
{
    use HasFactory;
    protected $table    =   AutoPartTypeContract::TABLE;
    protected $fillable =   AutoPartTypeContract::FILLABLE;
}
