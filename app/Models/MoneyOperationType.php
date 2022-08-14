<?php

namespace App\Models;

use App\Domain\Contracts\MoneyOperationTypeContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MoneyOperationType extends Model
{
    use HasFactory;
    protected $table    =   MoneyOperationTypeContract::TABLE;
    protected $fillable =   MoneyOperationTypeContract::FILLABLE;
}
