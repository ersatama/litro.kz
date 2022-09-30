<?php

use App\Domain\Contracts\Contract;
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
            $table->unsignedBigInteger(Contract::PAYMENT_ID)->nullable();
            $table->unsignedInteger(Contract::WALLET_ID)->nullable();
            $table->unsignedInteger(Contract::CURRENCY_ID)->nullable();
            $table->float(Contract::AMOUNT)->nullable();
            $table->float(Contract::PREVIOUS_BALANCE)->nullable();
            $table->string(Contract::TYPE)->nullable();
            $table->string(Contract::STATUS)->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->index(Contract::PAYMENT_ID);
            $table->index(Contract::WALLET_ID);
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
