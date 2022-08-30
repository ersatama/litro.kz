<?php

use App\Domain\Contracts\MainContract;
use App\Domain\Contracts\OrderServiceContract;
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
        Schema::create(OrderServiceContract::TABLE, function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger(MainContract::CITY_ID)->nullable();
            $table->unsignedInteger(MainContract::CATEGORY_ID)->nullable();
            $table->unsignedBigInteger(MainContract::MASTER_ID)->nullable();
            $table->unsignedBigInteger(MainContract::USER_ID)->nullable();
            $table->unsignedBigInteger(MainContract::ORDER_CARD_ID)->nullable();
            $table->unsignedBigInteger(MainContract::BITRIX_ID)->nullable();
            $table->unsignedBigInteger(MainContract::PLACE_ID)->nullable();
            $table->unsignedBigInteger(MainContract::PAYBOX_ORDER_ID)->nullable();
            $table->string(MainContract::PAYBOX_ORDER_DATE)->nullable();
            $table->string(MainContract::NAME)->nullable();
            $table->string(MainContract::PHONE)->nullable();
            $table->string(MainContract::STATUS)->nullable();
            $table->string(MainContract::PRICE)->nullable();
            $table->string(MainContract::OLD_PRICE)->nullable();
            $table->string(MainContract::PAYMENT_TYPE)->nullable();
            $table->string(MainContract::PAYMENT_METHOD)->nullable();
            $table->string(MainContract::ADDRESS)->nullable();
            $table->string(MainContract::LAT)->nullable();
            $table->string(MainContract::LONG)->nullable();
            $table->string(MainContract::UTM_CAMPAIGN)->nullable();
            $table->text(MainContract::REVIEW)->nullable();
            $table->boolean(MainContract::IS_PAYED)->default(false);
            $table->boolean(MainContract::IS_CARD)->nullable();
            $table->boolean(MainContract::IS_CANCELED)->default(false);
            $table->unsignedTinyInteger(MainContract::RANK)->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->index(MainContract::CITY_ID);
            $table->index(MainContract::USER_ID);
            $table->index(MainContract::CATEGORY_ID);
            $table->index(MainContract::ORDER_CARD_ID);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists(OrderServiceContract::TABLE);
    }
};
