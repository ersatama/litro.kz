<?php

use App\Domain\Contracts\Contract;
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
            $table->unsignedInteger(Contract::S_PARTNER_POINT_WALLET_ID)->nullable();
            $table->unsignedInteger(Contract::S_PARTNER_RECEIVED_SERVICE_ID)->nullable();
            $table->string(Contract::TYPE)->nullable();
            $table->string(Contract::STATUS)->nullable();
            $table->unsignedBigInteger(Contract::SUM)->default(0)->nullable();
            $table->unsignedBigInteger(Contract::PREVIOUS_BALANCE)->default(0)->nullable();
            $table->unsignedBigInteger(Contract::PAYMENT_ID)->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->index(Contract::S_PARTNER_POINT_WALLET_ID);
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
