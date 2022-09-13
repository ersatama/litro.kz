<?php

namespace App\Models;

use App\Domain\Contracts\SPartnerPointWalletContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SPartnerPointWallet extends Model
{
    use HasFactory;
    protected $table    =   SPartnerPointWalletContract::TABLE;
    protected $fillable =   SPartnerPointWalletContract::FILLABLE;
}
