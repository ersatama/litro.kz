<?php

namespace App\Models;

use App\Domain\Contracts\SPartnerPointContract;
use App\Domain\Scopes\OrderBy;
use App\Domain\Scopes\WithDeleted;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SPartnerPoint extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;

    protected $table    =   SPartnerPointContract::TABLE;
    protected $fillable =   SPartnerPointContract::FILLABLE;

    protected static function booted(): void
    {
        static::addGlobalScope(new OrderBy);
        static::addGlobalScope(new WithDeleted);
    }

    public function image(): BelongsTo
    {
        return $this->belongsTo(Image::class);
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

}
