<?php

use App\Domain\Contracts\DriverContract;
use App\Domain\Contracts\Contract;
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
            $table->unsignedBigInteger(Contract::ORDER_CARD_ID)->nullable();
            $table->string(Contract::FIRST_NAME)->nullable();
            $table->string(Contract::LAST_NAME)->nullable();
            $table->string(Contract::PATRONYMIC)->nullable();
            $table->string(Contract::REFERRAL_CODE)->nullable();
            $table->string(Contract::PHONE)->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->index(Contract::ORDER_CARD_ID);
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
