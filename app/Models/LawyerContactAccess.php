<?php

namespace App\Models;

use App\Domain\Contracts\LawyerContactAccessContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LawyerContactAccess extends Model
{
    use HasFactory;
    protected $table    =   LawyerContactAccessContract::TABLE;
    protected $fillable =   LawyerContactAccessContract::FILLABLE;
}
