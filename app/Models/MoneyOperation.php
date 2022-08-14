<?php

namespace App\Models;

use App\Domain\Contracts\MoneyOperationContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MoneyOperation extends Model
{
    use HasFactory;
    protected $table    =   MoneyOperationContract::TABLE;
    protected $fillable =   MoneyOperationContract::FILLABLE;
}
