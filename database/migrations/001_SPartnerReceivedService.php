<?php

use App\Domain\Contracts\Contract;
use App\Domain\Contracts\SPartnerReceivedServiceContract;
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
        Schema::create(SPartnerReceivedServiceContract::TABLE, function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger(Contract::USER_ID)->nullable();
            $table->unsignedInteger(Contract::S_PARTNER_POINT_ID)->nullable();
            $table->unsignedTinyInteger(Contract::CURRENCY_ID)->nullable();
            $table->unsignedBigInteger(Contract::PRICE)->nullable();
            $table->boolean(Contract::IS_PAID)->default(false);
            $table->string(Contract::STATUS)->nullable();
            $table->unsignedBigInteger(Contract::SUM_FROM_WALLET)->nullable();
            $table->unsignedBigInteger(Contract::SUM_FROM_BANK_CARD)->default(0)->nullable();
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
        Schema::dropIfExists(SPartnerReceivedServiceContract::TABLE);
    }
};
