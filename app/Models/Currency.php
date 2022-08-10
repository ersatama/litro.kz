<?php

namespace App\Models;

use App\Domain\Contracts\CurrencyContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;
    protected $table    =   CurrencyContract::TABLE;
    protected $fillable =   CurrencyContract::FILLABLE;
}
