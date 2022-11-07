<?php

namespace App\Models;

use App\Domain\Contracts\AutoPartContract;
use App\Domain\Scopes\OrderBy;
use App\Domain\Scopes\WithDeleted;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AutoPart extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;
    protected $table    =   AutoPartContract::TABLE;
    protected $fillable =   AutoPartContract::FILLABLE;

    protected static function booted(): void
    {
        static::addGlobalScope(new OrderBy);
        static::addGlobalScope(new WithDeleted);
    }

    public function image(): BelongsTo
    {
        return $this->belongsTo(Image::class);
    }

    public function auto_part_category(): BelongsTo
    {
        return $this->belongsTo(AutoPartCategory::class);
    }
}
