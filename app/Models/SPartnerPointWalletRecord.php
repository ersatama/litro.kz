<?php

namespace App\Models;

use App\Domain\Contracts\SPartnerPointWalletRecordContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SPartnerPointWalletRecord extends Model
{
    use HasFactory;
    protected $table    =   SPartnerPointWalletRecordContract::TABLE;
    protected $fillable =   SPartnerPointWalletRecordContract::FILLABLE;
}
