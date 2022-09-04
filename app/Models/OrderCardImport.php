<?php

namespace App\Models;

use App\Domain\Contracts\OrderCardImportContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderCardImport extends Model
{
    use HasFactory;
    protected $table    =   OrderCardImportContract::TABLE;
    protected $fillable =   OrderCardImportContract::FILLABLE;
}
