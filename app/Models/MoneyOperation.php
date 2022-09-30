<?php

namespace App\Models;

use App\Domain\Contracts\MoneyOperationContract;
use App\Domain\Scopes\OrderBy;
use App\Domain\Scopes\WithDeleted;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MoneyOperation extends Model
{
    use HasFactory;

    protected $table    =   MoneyOperationContract::TABLE;
    protected $fillable =   MoneyOperationContract::FILLABLE;

    protected static function booted(): void
    {
        static::addGlobalScope(new OrderBy);
        static::addGlobalScope(new WithDeleted);
    }

    public function money_operation_type(): BelongsTo
    {
        return $this->belongsTo(MoneyOperationType::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function wallet_record(): BelongsTo
    {
        return $this->belongsTo(WalletRecord::class);
    }

    public function payment(): BelongsTo
    {
        return $this->belongsTo(Payment::class);
    }

}
