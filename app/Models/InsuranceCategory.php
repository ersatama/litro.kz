<?php

namespace App\Models;

use App\Domain\Contracts\InsuranceCategoryContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InsuranceCategory extends Model
{
    use HasFactory;
    protected $table    =   InsuranceCategoryContract::TABLE;
    protected $fillable =   InsuranceCategoryContract::FILLABLE;
}
