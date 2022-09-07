<?php

namespace App\Models;

use App\Domain\Contracts\WalletRecordContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WalletRecord extends Model
{
    use HasFactory;
    protected $table    =   WalletRecordContract::TABLE;
    protected $fillable =   WalletRecordContract::FILLABLE;
}
