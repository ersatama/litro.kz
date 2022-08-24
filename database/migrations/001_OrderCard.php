<?php

use App\Domain\Contracts\MainContract;
use App\Domain\Contracts\OrderCardContract;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create(OrderCardContract::TABLE, function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger(MainContract::CARD_ID)->nullable();
            $table->unsignedBigInteger(MainContract::USER_ID)->nullable();
            $table->unsignedInteger(MainContract::BITRIX_ID)->nullable();
            $table->unsignedInteger(MainContract::SYNCED)->default(0);
            $table->integer(MainContract::PRICE)->nullable();
            $table->timestamp(MainContract::START_DATE)->nullable();
            $table->timestamp(MainContract::END_DATE)->nullable();
            $table->string(MainContract::NUMBER)->nullable();
            $table->string(MainContract::PAYMENT_TYPE)->nullable();
            $table->string(MainContract::PAYBOX_ORDER_ID)->nullable();
            $table->string(MainContract::PAYBOX_ORDER_DATE)->nullable();
            $table->string(MainContract::STATUS)->nullable();
            $table->string(MainContract::REFERRAL,20)->nullable();
            $table->string(MainContract::PAYMENT_METHOD,50)->nullable();
            $table->string(MainContract::UTM_CAMPAIGN)->nullable();
            $table->string(MainContract::IMPORT_ID)->nullable();
            $table->boolean(MainContract::RECURRENT_ENABLED)->default(false);
            $table->boolean(MainContract::IS_PAYED)->default(false);
            $table->boolean(MainContract::IS_CANCELED)->default(false);
            $table->boolean(MainContract::MONTHLY)->default(false);
            $table->boolean(MainContract::IS_FROM_EXCEL)->nullable();
            $table->timestamp(MainContract::ACTIVATE_DATE)->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->index(MainContract::CARD_ID);
            $table->index(MainContract::USER_ID);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists(OrderCardContract::TABLE);
    }
};
