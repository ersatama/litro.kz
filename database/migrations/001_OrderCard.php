<?php

use App\Domain\Contracts\Contract;
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
            $table->unsignedBigInteger(Contract::CARD_ID)->nullable();
            $table->unsignedBigInteger(Contract::USER_ID)->nullable();
            $table->unsignedInteger(Contract::BITRIX_ID)->nullable();
            $table->unsignedInteger(Contract::SYNCED)->default(0);
            $table->integer(Contract::PRICE)->nullable();
            $table->timestamp(Contract::START_DATE)->nullable();
            $table->timestamp(Contract::END_DATE)->nullable();
            $table->string(Contract::NUMBER)->nullable();
            $table->string(Contract::PAYMENT_TYPE)->nullable();
            $table->string(Contract::PAYBOX_ORDER_ID)->nullable();
            $table->string(Contract::PAYBOX_ORDER_DATE)->nullable();
            $table->string(Contract::STATUS)->nullable();
            $table->string(Contract::REFERRAL,20)->nullable();
            $table->string(Contract::PAYMENT_METHOD,50)->nullable();
            $table->string(Contract::UTM_CAMPAIGN)->nullable();
            $table->string(Contract::IMPORT_ID)->nullable();
            $table->boolean(Contract::RECURRENT_ENABLED)->default(false)->nullable();
            $table->boolean(Contract::IS_PAID)->default(false)->nullable();
            $table->boolean(Contract::IS_CANCELED)->default(false)->nullable();
            $table->boolean(Contract::MONTHLY)->default(false)->nullable();
            $table->boolean(Contract::IS_FROM_EXCEL)->nullable();
            $table->timestamp(Contract::ACTIVATE_DATE)->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->index(Contract::CARD_ID);
            $table->index(Contract::USER_ID);
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
