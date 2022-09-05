<?php

namespace App\Models;

use App\Domain\Contracts\StockContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
    protected $table    =   StockContract::TABLE;
    protected $fillable =   StockContract::FILLABLE;
}
