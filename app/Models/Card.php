<?php

namespace App\Models;

use App\Domain\Contracts\CardContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;
    protected $table    =   CardContract::TABLE;
    protected $fillable =   CardContract::FILLABLE;
}
