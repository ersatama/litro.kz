<?php

namespace App\Models;

use App\Domain\Contracts\PaymentSystemContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentSystem extends Model
{
    use HasFactory;
    protected $table    =   PaymentSystemContract::TABLE;
    protected $fillable =   PaymentSystemContract::FILLABLE;
}
