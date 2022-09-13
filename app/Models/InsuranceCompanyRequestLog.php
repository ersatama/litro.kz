<?php

namespace App\Models;

use App\Domain\Contracts\InsuranceCompanyRequestLogContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InsuranceCompanyRequestLog extends Model
{
    use HasFactory;
    protected $table    =   InsuranceCompanyRequestLogContract::TABLE;
    protected $fillable =   InsuranceCompanyRequestLogContract::FILLABLE;
}
