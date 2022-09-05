<?php

namespace App\Models;

use App\Domain\Contracts\TransactionContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $table    =   TransactionContract::TABLE;
    protected $fillable =   TransactionContract::FILLABLE;
}
