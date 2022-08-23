<?php

namespace App\Models;

use App\Domain\Contracts\EcoServiceContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EcoService extends Model
{
    use HasFactory;
    protected $table    =   EcoServiceContract::TABLE;
    protected $fillable =   EcoServiceContract::FILLABLE;
}
