<?php

namespace App\Models;

use App\Domain\Contracts\Contract;
use App\Domain\Contracts\ServiceContract;
use App\Domain\Scopes\OrderBy;
use App\Domain\Scopes\WithDeleted;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Service extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;

    protected $table    =   ServiceContract::TABLE;
    protected $fillable =   ServiceContract::FILLABLE;

    protected static function booted(): void
    {
        static::addGlobalScope(new OrderBy);
        static::addGlobalScope(new WithDeleted);
    }

    public function service_type(): BelongsTo
    {
        return $this->belongsTo(ServiceType::class);
    }

    public function image(): BelongsTo
    {
        return $this->belongsTo(Image::class,Contract::IMAGE_ID,Contract::ID);
    }

    public function browser_image(): BelongsTo
    {
        return $this->belongsTo(Image::class,Contract::BROWSER_IMAGE_ID,Contract::ID);
    }

    public function additional_image(): BelongsTo
    {
        return $this->belongsTo(Image::class,Contract::ADDITIONAL_IMAGE_ID,Contract::ID);
    }
}
