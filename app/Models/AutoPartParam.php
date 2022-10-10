<?php

namespace App\Models;

use App\Domain\Contracts\AutoPartParamContract;
use App\Domain\Scopes\OrderBy;
use App\Domain\Scopes\WithDeleted;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AutoPartParam extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;

    protected $table    =   AutoPartParamContract::TABLE;
    protected $fillable =   AutoPartParamContract::FILLABLE;

    protected static function booted(): void
    {
        static::addGlobalScope(new OrderBy);
        static::addGlobalScope(new WithDeleted);
    }

    public function auto_part_category(): BelongsTo
    {
        return $this->belongsTo(AutoPartCategory::class);
    }

    public function auto_part_type(): BelongsTo
    {
        return $this->belongsTo(AutoPartType::class);
    }
}
