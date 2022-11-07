<?php

use App\Domain\Contracts\CityServiceContract;
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
        Schema::create(CityServiceContract::TABLE, function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger(Contract::CITY_ID)->nullable();
            $table->unsignedBigInteger(Contract::SERVICE_ID)->nullable();
            $table->unsignedBigInteger(Contract::PRICE)->default(0);
            $table->boolean(Contract::IS_FREE)->default(false);
            $table->boolean(Contract::IS_WITH_CHECK)->default(false);
            $table->boolean(Contract::IS_NEGOTIABLE_PRICE)->default(false);
            $table->timestamps();
            $table->softDeletes();
            $table->index(Contract::CITY_ID);
            $table->index(Contract::SERVICE_ID);
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
