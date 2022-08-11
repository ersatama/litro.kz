<?php

namespace App\Models;

use App\Domain\Contracts\CardCategoryContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CardCategory extends Model
{
    use HasFactory;
    protected $table    =   CardCategoryContract::TABLE;
    protected $fillable =   CardCategoryContract::FILLABLE;
}
