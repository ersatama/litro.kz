<?php

use App\Domain\Contracts\MainContract;
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
            $table->unsignedBigInteger(MainContract::USER_ID)->nullable();
            $table->unsignedInteger(MainContract::S_PARTNER_POINT_ID)->nullable();
            $table->unsignedTinyInteger(MainContract::CURRENCY_ID)->nullable();
            $table->unsignedBigInteger(MainContract::PRICE)->nullable();
            $table->boolean(MainContract::IS_PAID)->default(false);
            $table->string(MainContract::STATUS)->nullable();
            $table->unsignedBigInteger(MainContract::SUM_FROM_WALLET)->nullable();
            $table->unsignedBigInteger(MainContract::SUM_FROM_BANK_CARD)->default(0)->nullable();
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
