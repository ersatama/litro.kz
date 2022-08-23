<?php

use App\Domain\Contracts\DriverContract;
use App\Domain\Contracts\MainContract;
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
        Schema::create(DriverContract::TABLE, function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger(MainContract::ORDER_CARD_ID)->nullable();
            $table->string(MainContract::FIRST_NAME)->nullable();
            $table->string(MainContract::LAST_NAME)->nullable();
            $table->string(MainContract::PATRONYMIC)->nullable();
            $table->string(MainContract::REFERRAL_CODE)->nullable();
            $table->string(MainContract::PHONE)->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->index(MainContract::ORDER_CARD_ID);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists(DriverContract::TABLE);
    }
};
