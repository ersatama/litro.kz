<?php

namespace App\Models;

use App\Domain\Contracts\LawyerServicePivotContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LawyerServicePivot extends Model
{
    use HasFactory;
    protected $table    =   LawyerServicePivotContract::TABLE;
    protected $fillable =   LawyerServicePivotContract::FILLABLE;
}
