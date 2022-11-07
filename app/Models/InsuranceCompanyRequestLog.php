<?php

namespace App\Models;

use App\Domain\Contracts\InsuranceCompanyRequestLogContract;
use App\Domain\Scopes\OrderBy;
use App\Domain\Scopes\WithDeleted;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InsuranceCompanyRequestLog extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;

    protected $table    =   InsuranceCompanyRequestLogContract::TABLE;
    protected $fillable =   InsuranceCompanyRequestLogContract::FILLABLE;

    protected static function booted(): void
    {
        static::addGlobalScope(new OrderBy);
        static::addGlobalScope(new WithDeleted);
    }

    public function insurance_company(): BelongsTo
    {
        return $this->belongsTo(InsuranceCompany::class);
    }

}
