<?php

namespace App\Models;

use App\Domain\Contracts\LawyerContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lawyer extends Model
{
    use HasFactory;
    protected $table    =   LawyerContract::TABLE;
    protected $fillable =   LawyerContract::FILLABLE;
}
