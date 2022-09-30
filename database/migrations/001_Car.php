<?php

use App\Domain\Contracts\CarContract;
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
        Schema::create(CarContract::TABLE, function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger(Contract::CAR_MODEL_ID)->nullable();
            $table->unsignedBigInteger(Contract::ORDER_CARD_ID)->nullable();
            $table->char(Contract::YEAR,4)->nullable();
            $table->string(Contract::CAR_NUMBER)->nullable();
            $table->string(Contract::VIN)->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->index(Contract::CAR_MODEL_ID);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists(CarContract::TABLE);
    }
};
