<?php

namespace App\Models;

use App\Domain\Contracts\AutoPartParamOptionContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AutoPartParamOption extends Model
{
    use HasFactory;
    protected $table    =   AutoPartParamOptionContract::TABLE;
    protected $fillable =   AutoPartParamOptionContract::FILLABLE;
}
