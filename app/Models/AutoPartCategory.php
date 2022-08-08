<?php

namespace App\Models;

use App\Domain\Contracts\AutoPartContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AutoPartCategory extends Model
{
    use HasFactory;
    protected $table    =   AutoPartContract::TABLE;
    protected $fillable =   AutoPartContract::FILLABLE;
}
