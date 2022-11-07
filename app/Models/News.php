<?php

namespace App\Models;

use App\Domain\Contracts\NewsContract;
use App\Domain\Scopes\OrderBy;
use App\Domain\Scopes\WithDeleted;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class News extends Model
{
    use CrudTrait;
    use HasFactory;

    protected $table    =   NewsContract::TABLE;
    protected $fillable =   NewsContract::FILLABLE;

    protected static function booted(): void
    {
        static::addGlobalScope(new OrderBy);
        static::addGlobalScope(new WithDeleted);
    }

    public function image(): BelongsTo
    {
        return $this->belongsTo(Image::class);
    }

    public function news_category(): BelongsTo
    {
        return $this->belongsTo(NewsCategory::class);
    }
}
