<?php

namespace App\Models;

use App\Domain\Contracts\WalletContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    use HasFactory;
    protected $table    =   WalletContract::TABLE;
    protected $fillable =   WalletContract::FILLABLE;
}
