<?php

use App\Domain\Contracts\MainContract;
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
            $table->unsignedBigInteger(MainContract::USER_ID)->nullable();
            $table->unsignedInteger(MainContract::PAYMENT_SYSTEM_ID)->nullable();
            $table->unsignedInteger(MainContract::SUM)->nullable();
            $table->unsignedInteger(MainContract::CURRENCY_ID)->nullable();
            $table->string(MainContract::STATUS)->nullable();
            $table->text(MainContract::PAYMENT_SYSTEM_INFO)->nullable();
            $table->string(MainContract::PAYMENT_TYPE)->nullable();
            $table->string(MainContract::PAYMENT_ID)->nullable();
            $table->string(MainContract::PAYMENT_KEY)->nullable();
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
