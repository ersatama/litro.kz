<?php

namespace App\Models;

use App\Domain\Contracts\UserContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User  extends \TCG\Voyager\Models\User
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table    =   UserContract::TABLE;
    protected $fillable =   UserContract::FILLABLE;
    protected $hidden   =   UserContract::HIDDEN;
}
