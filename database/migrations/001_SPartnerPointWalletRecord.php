<?php

use App\Domain\Contracts\MainContract;
use App\Domain\Contracts\SPartnerPointWalletRecordContract;
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
        Schema::create(SPartnerPointWalletRecordContract::TABLE, function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger(MainContract::S_PARTNER_POINT_WALLET_ID)->nullable();
            $table->unsignedInteger(MainContract::S_PARTNER_RECEIVED_ID)->nullable();
            $table->string(MainContract::TYPE)->nullable();
            $table->string(MainContract::STATUS)->nullable();
            $table->unsignedBigInteger(MainContract::SUM)->default(0)->nullable();
            $table->unsignedBigInteger(MainContract::PREVIOUS_BALANCE)->default(0)->nullable();
            $table->unsignedBigInteger(MainContract::PAYMENT_ID)->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->index(MainContract::S_PARTNER_POINT_WALLET_ID);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists(SPartnerPointWalletRecordContract::TABLE);
    }
};
