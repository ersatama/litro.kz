<?php

namespace App\Models;

use App\Domain\Contracts\CategoryContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table    =   CategoryContract::TABLE;
    protected $fillable =   CategoryContract::FILLABLE;
}
