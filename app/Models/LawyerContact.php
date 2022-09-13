<?php

namespace App\Models;

use App\Domain\Contracts\LawyerContactContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LawyerContact extends Model
{
    use HasFactory;
    protected $table    =   LawyerContactContract::TABLE;
    protected $fillable =   LawyerContactContract::FILLABLE;
}
