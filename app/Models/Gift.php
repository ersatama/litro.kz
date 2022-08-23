<?php

namespace App\Models;

use App\Domain\Contracts\GiftContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gift extends Model
{
    use HasFactory;
    protected $table    =   GiftContract::TABLE;
    protected $fillable =   GiftContract::FILLABLE;
}
