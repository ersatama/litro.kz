<?php

namespace App\Models;

use App\Domain\Contracts\InsuranceImageContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InsuranceImage extends Model
{
    use HasFactory;
    protected $table    =   InsuranceImageContract::TABLE;
    protected $fillable =   InsuranceImageContract::FILLABLE;
}
