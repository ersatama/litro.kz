<?php

namespace App\Models;

use App\Domain\Contracts\OrderCardContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderCard extends Model
{
    use HasFactory;
    protected $table    =   OrderCardContract::TABLE;
    protected $fillable =   OrderCardContract::FILLABLE;
}
