<?php

use App\Domain\Contracts\Contract;
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
            $table->unsignedInteger(Contract::CAR_CATEGORY_ID)->nullable();
            $table->unsignedInteger(Contract::CITY_ID)->nullable();
            $table->unsignedBigInteger(Contract::MASTER_ID)->nullable();
            $table->unsignedBigInteger(Contract::USER_ID)->nullable();
            $table->unsignedBigInteger(Contract::ORDER_CARD_ID)->nullable();
            $table->unsignedBigInteger(Contract::BITRIX_ID)->nullable();
            $table->unsignedBigInteger(Contract::PLACE_ID)->nullable();
            $table->string(Contract::PAYBOX_ORDER_ID)->nullable();
            $table->string(Contract::PAYBOX_ORDER_DATE)->nullable();
            $table->string(Contract::NAME)->nullable();
            $table->string(Contract::PHONE)->nullable();
            $table->string(Contract::STATUS)->nullable();
            $table->string(Contract::PRICE)->nullable();
            $table->string(Contract::OLD_PRICE)->nullable();
            $table->string(Contract::PAYMENT_TYPE)->nullable();
            $table->string(Contract::PAYMENT_METHOD)->nullable();
            $table->string(Contract::ADDRESS)->nullable();
            $table->string(Contract::LAT)->nullable();
            $table->string(Contract::LONG)->nullable();
            $table->string(Contract::UTM_CAMPAIGN)->nullable();
            $table->text(Contract::REVIEW)->nullable();
            $table->boolean(Contract::IS_PAID)->default(false);
            $table->boolean(Contract::IS_CARD)->nullable();
            $table->boolean(Contract::IS_CANCELED)->default(false);
            $table->unsignedTinyInteger(Contract::RANK)->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->index(Contract::CITY_ID);
            $table->index(Contract::USER_ID);
            $table->index(Contract::CAR_CATEGORY_ID);
            $table->index(Contract::ORDER_CARD_ID);
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
