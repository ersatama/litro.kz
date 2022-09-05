<?php

namespace App\Models;

use App\Domain\Contracts\TransactionToNonExistingUserContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionToNonExistingUser extends Model
{
    use HasFactory;
    protected $table    =   TransactionToNonExistingUserContract::TABLE;
    protected $fillable =   TransactionToNonExistingUserContract::FILLABLE;
}
