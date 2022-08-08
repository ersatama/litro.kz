<?php

namespace App\Models;

use App\Domain\Contracts\NewsContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $table    =   NewsContract::TABLE;
    protected $fillable =   NewsContract::FILLABLE;
}
