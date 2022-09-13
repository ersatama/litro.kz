<?php

namespace App\Models;

use App\Domain\Contracts\SPartnerReceivedServiceContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SPartnerReceivedService extends Model
{
    use HasFactory;
    protected $table    =   SPartnerReceivedServiceContract::TABLE;
    protected $fillable =   SPartnerReceivedServiceContract::FILLABLE;
}
