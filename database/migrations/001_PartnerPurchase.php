<?php

use App\Domain\Contracts\Contract;
use App\Domain\Contracts\PartnerPurchaseContract;
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
        Schema::create(PartnerPurchaseContract::TABLE, function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger(Contract::PARTNER_ID)->nullable();
            $table->string(Contract::PURCHASE_ID)->nullable();
            $table->timestamp(Contract::PURCHASE_DATE)->nullable();
            $table->string(Contract::PHONE)->nullable();
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
        Schema::dropIfExists(PartnerPurchaseContract::TABLE);
    }
};
