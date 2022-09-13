<?php

namespace App\Models;

use App\Domain\Contracts\InsuranceSelectContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InsuranceSelect extends Model
{
    use HasFactory;
    protected $table    =   InsuranceSelectContract::TABLE;
    protected $fillable =   InsuranceSelectContract::FILLABLE;
}
