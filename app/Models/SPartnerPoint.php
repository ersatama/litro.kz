<?php

namespace App\Models;

use App\Domain\Contracts\SPartnerPointContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SPartnerPoint extends Model
{
    use HasFactory;
    protected $table    =   SPartnerPointContract::TABLE;
    protected $fillable =   SPartnerPointContract::FILLABLE;
}
