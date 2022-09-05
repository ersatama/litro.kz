<?php

namespace App\Models;

use App\Domain\Contracts\ThirdPartyAppContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThirdPartyApp extends Model
{
    use HasFactory;
    protected $table    =   ThirdPartyAppContract::TABLE;
    protected $fillable =   ThirdPartyAppContract::FILLABLE;
}
