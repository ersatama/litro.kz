<?php

namespace App\Models;

use App\Domain\Contracts\CardRangeContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CardRange extends Model
{
    use HasFactory;
    protected $table    =   CardRangeContract::TABLE;
    protected $fillable =   CardRangeContract::FILLABLE;
}
