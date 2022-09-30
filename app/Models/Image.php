<?php

namespace App\Models;

use App\Domain\Contracts\ImageContract;
use App\Domain\Contracts\Contract;
use App\Domain\Scopes\OrderBy;
use App\Domain\Scopes\WithDeleted;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use App\Domain\Helpers\Image as ImageHelper;

class Image extends Model
{
    use HasFactory;
    protected $table    =   ImageContract::TABLE;
    protected $fillable =   ImageContract::FILLABLE;

    protected static function booted(): void
    {
        static::addGlobalScope(new OrderBy);
        static::addGlobalScope(new WithDeleted);
    }

    public function getPngAttribute($value): string
    {
        return asset(ImageHelper::PATH.$value);
    }

    public function getJpgAttribute($value): string
    {
        return asset(ImageHelper::PATH.$value);
    }

    public function getWebpAttribute($value): string
    {
        return asset(ImageHelper::PATH.$value);
    }

}
