<?php

namespace App\Models;

use App\Domain\Contracts\InsuranceImageContract;
use App\Domain\Scopes\OrderBy;
use App\Domain\Scopes\WithDeleted;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InsuranceImage extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;
    protected $table    =   InsuranceImageContract::TABLE;
    protected $fillable =   InsuranceImageContract::FILLABLE;

    protected static function booted(): void
    {
        static::addGlobalScope(new OrderBy);
        static::addGlobalScope(new WithDeleted);
    }

    public function image(): BelongsTo
    {
        return $this->belongsTo(Image::class);
    }

}
