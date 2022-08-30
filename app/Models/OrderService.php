<?php

namespace App\Models;

use App\Domain\Contracts\OrderServiceContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderService extends Model
{
    use HasFactory;
    protected $table    =   OrderServiceContract::TABLE;
    protected $fillable =   OrderServiceContract::FILLABLE;
}
