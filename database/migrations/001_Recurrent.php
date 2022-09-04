<?php

use App\Domain\Contracts\MainContract;
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
            $table->unsignedInteger(MainContract::AMOUNT)->nullable();
            $table->timestamp(MainContract::PAYMENT_DATE)->nullable();
            $table->string(MainContract::CARD_PAN)->nullable();
            $table->unsignedInteger(MainContract::ORDER_ID)->nullable();
            $table->string(MainContract::RECURRING_PROFILE_ID)->nullable();
            $table->timestamp(MainContract::NEXT_PAYMENT)->nullable();
            $table->unsignedTinyInteger(MainContract::RESULT)->default(0);
            $table->string(MainContract::SALT)->nullable();
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
