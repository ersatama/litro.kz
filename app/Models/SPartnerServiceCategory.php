<?php

namespace App\Models;

use App\Domain\Contracts\SPartnerServiceCategoryContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SPartnerServiceCategory extends Model
{
    use HasFactory;
    protected $table    =   SPartnerServiceCategoryContract::TABLE;
    protected $fillable =   SPartnerServiceCategoryContract::FILLABLE;
}
