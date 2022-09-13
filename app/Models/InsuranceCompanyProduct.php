<?php

namespace App\Models;

use App\Domain\Contracts\InsuranceCompanyContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InsuranceCompanyProduct extends Model
{
    use HasFactory;
    protected $table    =   InsuranceCompanyContract::TABLE;
    protected $fillable =   InsuranceCompanyContract::FILLABLE;
}
