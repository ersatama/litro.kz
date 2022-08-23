<?php

use App\Domain\Contracts\GiftContract;
use App\Domain\Contracts\MainContract;
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
            $table->unsignedBigInteger(MainContract::USER_ID)->nullable();
            $table->unsignedBigInteger(MainContract::CARD_ID)->nullable();
            $table->unsignedBigInteger(MainContract::ACTIVATED_BY)->nullable();
            $table->string(MainContract::NUMBER)->nullable();
            $table->boolean(MainContract::IS_PAYED)->default(false);
            $table->string(MainContract::PAYBOX_ORDER_ID)->nullable();
            $table->string(MainContract::PAYBOX_ORDER_DATE)->nullable();
            $table->unsignedInteger(MainContract::PRICE)->default(0);
            $table->string(MainContract::PROMO_CODE)->nullable();
            $table->string(MainContract::PHONE)->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->index(MainContract::USER_ID);
            $table->index(MainContract::CARD_ID);
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
