<?php

use App\Domain\Contracts\Contract;
use App\Domain\Contracts\PaymentContract;
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
        Schema::create(PaymentContract::TABLE, function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger(Contract::USER_ID)->nullable();
            $table->unsignedInteger(Contract::PAYMENT_SYSTEM_ID)->nullable();
            $table->unsignedInteger(Contract::SUM)->nullable();
            $table->unsignedInteger(Contract::CURRENCY_ID)->nullable();
            $table->string(Contract::STATUS)->nullable();
            $table->text(Contract::PAYMENT_SYSTEM_INFO)->nullable();
            $table->string(Contract::PAYMENT_TYPE)->nullable();
            $table->string(Contract::PAYMENT_ID)->nullable();
            $table->string(Contract::PAYMENT_KEY)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists(PaymentContract::TABLE);
    }
};
