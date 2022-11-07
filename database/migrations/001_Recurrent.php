<?php

use App\Domain\Contracts\Contract;
use App\Domain\Contracts\RecurrentContract;
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
        Schema::create(RecurrentContract::TABLE, function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger(Contract::AMOUNT)->nullable();
            $table->timestamp(Contract::PAYMENT_DATE)->nullable();
            $table->string(Contract::CARD_PAN)->nullable();
            $table->unsignedInteger(Contract::ORDER_ID)->nullable();
            $table->string(Contract::RECURRING_PROFILE_ID)->nullable();
            $table->timestamp(Contract::NEXT_PAYMENT)->nullable();
            $table->unsignedTinyInteger(Contract::RESULT)->default(0);
            $table->string(Contract::SALT)->nullable();
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
        Schema::dropIfExists(RecurrentContract::TABLE);
    }
};
