<?php

use App\Domain\Contracts\GiftContract;
use App\Domain\Contracts\Contract;
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
        Schema::create(GiftContract::TABLE, function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger(Contract::USER_ID)->nullable();
            $table->unsignedBigInteger(Contract::CARD_ID)->nullable();
            $table->unsignedBigInteger(Contract::ACTIVATED_BY)->nullable();
            $table->string(Contract::NUMBER)->nullable();
            $table->boolean(Contract::IS_PAID)->default(false);
            $table->string(Contract::PAYBOX_ORDER_ID)->nullable();
            $table->string(Contract::PAYBOX_ORDER_DATE)->nullable();
            $table->unsignedInteger(Contract::PRICE)->default(0);
            $table->string(Contract::PROMO_CODE)->nullable();
            $table->string(Contract::PHONE)->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->index(Contract::USER_ID);
            $table->index(Contract::CARD_ID);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists(GiftContract::TABLE);
    }
};
