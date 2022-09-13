<?php

namespace App\Models;

use App\Domain\Contracts\InsuranceSelectOptionContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InsuranceSelectOption extends Model
{
    use HasFactory;
    protected $table    =   InsuranceSelectOptionContract::TABLE;
    protected $fillable =   InsuranceSelectOptionContract::FILLABLE;
}
