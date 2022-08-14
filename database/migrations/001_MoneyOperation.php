<?php

use App\Domain\Contracts\MainContract;
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
            $table->unsignedInteger(MainContract::MONEY_OPERATION_TYPE_ID);
            $table->unsignedBigInteger(MainContract::USER_ID);
            $table->unsignedBigInteger(MainContract::WALLET_RECORD_ID)->nullable();
            $table->unsignedBigInteger(MainContract::PAYMENT_ID)->nullable();
            $table->string(MainContract::STATUS)->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->index(MainContract::USER_ID);
            $table->index(MainContract::WALLET_RECORD_ID);
            $table->index(MainContract::PAYMENT_ID);
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
