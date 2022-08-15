<?php

use App\Domain\Contracts\MainContract;
use App\Domain\Contracts\ServicePriceContract;
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
        Schema::create(ServicePriceContract::TABLE, function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger(MainContract::CITY_ID)->nullable();
            $table->unsignedBigInteger(MainContract::SERVICE_ID)->nullable();
            $table->unsignedBigInteger(MainContract::CAR_CATEGORY_ID)->nullable();
            $table->unsignedInteger(MainContract::PRICE)->nullable();
            $table->boolean(MainContract::IS_FREE)->default(true);
            $table->boolean(MainContract::IS_WITH_CHECK)->default(true);
            $table->boolean(MainContract::IS_NEGOTIABLE_PRICE)->default(true);
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
        Schema::dropIfExists(ServicePriceContract::TABLE);
    }
};