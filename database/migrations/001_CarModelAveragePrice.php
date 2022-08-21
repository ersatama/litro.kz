<?php

use App\Domain\Contracts\CarModelAveragePriceContract;
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
        Schema::create(CarModelAveragePriceContract::TABLE, function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger(MainContract::CAR_MODEL_ID);
            $table->char(MainContract::YEAR,4);
            $table->string(MainContract::AVERAGE_PRICE)->nullable();
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
        Schema::dropIfExists(CarModelAveragePriceContract::TABLE);
    }
};
