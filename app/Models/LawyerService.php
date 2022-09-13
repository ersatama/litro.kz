<?php

namespace App\Models;

use App\Domain\Contracts\LawyerServiceContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LawyerService extends Model
{
    use HasFactory;
    protected $table    =   LawyerServiceContract::TABLE;
    protected $fillable =   LawyerServiceContract::FILLABLE;
}
