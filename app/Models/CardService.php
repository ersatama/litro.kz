<?php

namespace App\Models;

use App\Domain\Contracts\CardServiceContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CardService extends Model
{
    use HasFactory;
    protected $table    =   CardServiceContract::TABLE;
    protected $fillable =   CardServiceContract::FILLABLE;
}
