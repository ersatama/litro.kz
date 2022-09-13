<?php

namespace App\Models;

use App\Domain\Contracts\InsuranceKaskoPolicyContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InsuranceKaskoPolicy extends Model
{
    use HasFactory;
    protected $table    =   InsuranceKaskoPolicyContract::TABLE;
    protected $fillable =   InsuranceKaskoPolicyContract::FILLABLE;
}
