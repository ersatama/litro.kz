<?php

namespace App\Models;

use App\Domain\Contracts\SPartnerPointCategoryContract;
use App\Domain\Scopes\OrderBy;
use App\Domain\Scopes\WithDeleted;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SPartnerPointCategory extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;

    protected $table    =   SPartnerPointCategoryContract::TABLE;
    protected $fillable =   SPartnerPointCategoryContract::FILLABLE;

    protected static function booted(): void
    {
        static::addGlobalScope(new OrderBy);
        static::addGlobalScope(new WithDeleted);
    }

    public function s_partner_point(): BelongsTo
    {
        return $this->belongsTo(SPartnerPoint::class);
    }

    public function s_partner_service_category(): BelongsTo
    {
        return $this->belongsTo(SPartnerServiceCategory::class);
    }
}
