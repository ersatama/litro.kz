<?php

use App\Domain\Contracts\MainContract;
use App\Domain\Contracts\WalletRecordContract;
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
        Schema::create(WalletRecordContract::TABLE, function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger(MainContract::PAYMENT_ID)->nullable();
            $table->unsignedInteger(MainContract::WALLET_ID)->nullable();
            $table->unsignedInteger(MainContract::CURRENCY_ID)->nullable();
            $table->float(MainContract::AMOUNT)->nullable();
            $table->float(MainContract::PREVIOUS_BALANCE)->nullable();
            $table->string(MainContract::TYPE)->nullable();
            $table->string(MainContract::STATUS)->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->index(MainContract::PAYMENT_ID);
            $table->index(MainContract::WALLET_ID);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists(WalletRecordContract::TABLE);
    }
};
