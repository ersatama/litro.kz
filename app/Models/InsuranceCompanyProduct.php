<?php

namespace App\Models;

use App\Domain\Contracts\InsuranceCompanyProductContract;
use App\Domain\Scopes\OrderBy;
use App\Domain\Scopes\WithDeleted;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InsuranceCompanyProduct extends Model
{
    use HasFactory;
    protected $table    =   InsuranceCompanyProductContract::TABLE;
    protected $fillable =   InsuranceCompanyProductContract::FILLABLE;

    protected static function booted(): void
    {
        static::addGlobalScope(new OrderBy);
        static::addGlobalScope(new WithDeleted);
    }

    public function insurance_category(): BelongsTo
    {
        return $this->belongsTo(InsuranceCategory::class);
    }

    public function insurance_company(): BelongsTo
    {
        return $this->belongsTo(InsuranceCompany::class);
    }

}
