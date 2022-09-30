<?php

namespace App\Models;

use App\Domain\Contracts\CardContract;
use App\Domain\Contracts\Contract;
use App\Domain\Scopes\OrderBy;
use App\Domain\Scopes\WithDeleted;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Card extends Model
{
    use HasFactory;

    protected $table    =   CardContract::TABLE;
    protected $fillable =   CardContract::FILLABLE;

    protected static function booted(): void
    {
        static::addGlobalScope(new OrderBy);
        static::addGlobalScope(new WithDeleted);
    }

    public function card_category(): BelongsTo
    {
        return $this->belongsTo(CardCategory::class);
    }

    public function getColorsAttribute($value):array|null
    {
        return json_decode($value,true);
    }

    public function image(): BelongsTo
    {
        return $this->belongsTo(Image::class);
    }

    public function _icon(): BelongsTo
    {
        return $this->belongsTo(Image::class,Contract::ICON,Contract::ID);
    }

    public function _icon_selected(): BelongsTo
    {
        return $this->belongsTo(Image::class,Contract::ICON_SELECTED,Contract::ID);
    }

    public function _img(): BelongsTo
    {
        return $this->belongsTo(Image::class,Contract::IMG,Contract::ID);
    }
}
