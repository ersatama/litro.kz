<?php

use App\Domain\Contracts\CityServiceContract;
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
        Schema::create(CityServiceContract::TABLE, function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger(MainContract::CITY_ID)->nullable();
            $table->unsignedBigInteger(MainContract::SERVICE_ID)->nullable();
            $table->unsignedBigInteger(MainContract::PRICE)->default(0);
            $table->boolean(MainContract::IS_FREE)->default(false);
            $table->boolean(MainContract::IS_WITH_CHECK)->default(false);
            $table->boolean(MainContract::IS_NEGOTIABLE_PRICE)->default(false);
            $table->timestamps();
            $table->softDeletes();
            $table->index(MainContract::CITY_ID);
            $table->index(MainContract::SERVICE_ID);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists(CityServiceContract::TABLE);
    }
};
