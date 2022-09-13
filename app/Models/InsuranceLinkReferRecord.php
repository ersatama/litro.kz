<?php

namespace App\Models;

use App\Domain\Contracts\InsuranceLinkReferRecordContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InsuranceLinkReferRecord extends Model
{
    use HasFactory;
    protected $table    =   InsuranceLinkReferRecordContract::TABLE;
    protected $fillable =   InsuranceLinkReferRecordContract::FILLABLE;
}
