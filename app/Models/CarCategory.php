<?php

namespace App\Models;

use App\Domain\Contracts\CarCategoryContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarCategory extends Model
{
    use HasFactory;
    protected $table    =   CarCategoryContract::TABLE;
    protected $fillable =   CarCategoryContract::FILLABLE;
}
