<?php

use App\Domain\Contracts\Contract;
use App\Domain\Contracts\MoneyOperationContract;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create(MoneyOperationContract::TABLE, function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger(Contract::MONEY_OPERATION_TYPE_ID);
            $table->unsignedBigInteger(Contract::USER_ID);
            $table->unsignedBigInteger(Contract::WALLET_RECORD_ID)->nullable();
            $table->unsignedBigInteger(Contract::PAYMENT_ID)->nullable();
            $table->string(Contract::STATUS)->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->index(Contract::USER_ID);
            $table->index(Contract::WALLET_RECORD_ID);
            $table->index(Contract::PAYMENT_ID);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists(MoneyOperationContract::TABLE);
    }
};
