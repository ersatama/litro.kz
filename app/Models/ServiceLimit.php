<?php

namespace App\Models;

use App\Domain\Contracts\ServiceLimitContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceLimit extends Model
{
    use HasFactory;
    protected $table    =   ServiceLimitContract::TABLE;
    protected $fillable =   ServiceLimitContract::FILLABLE;
}
