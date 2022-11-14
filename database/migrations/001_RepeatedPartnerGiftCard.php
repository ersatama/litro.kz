<?php

use App\Domain\Contracts\Contract;
use App\Domain\Contracts\RepeatedPartnerGiftCardContract;
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
        Schema::create(RepeatedPartnerGiftCardContract::TABLE, function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger(Contract::CARD_ID)->nullable();
            $table->unsignedBigInteger(Contract::PARTNER_ID)->nullable();
            $table->string(Contract::PHONE)->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->index(Contract::CARD_ID);
            $table->index(Contract::PARTNER_ID);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists(RepeatedPartnerGiftCardContract::TABLE);
    }
};
