<?php

namespace App\Models;

use App\Domain\Contracts\NewsCategoryContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsCategory extends Model
{
    use HasFactory;
    protected $table    =   NewsCategoryContract::TABLE;
    protected $fillable =   NewsCategoryContract::FILLABLE;
}
