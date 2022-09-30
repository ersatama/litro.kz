<?php

use App\Domain\Contracts\LawyerCityContract;
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
        Schema::create(LawyerCityContract::TABLE, function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger(Contract::LAWYER_ID)->nullable();
            $table->unsignedInteger(Contract::CITY_ID)->nullable();
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
        Schema::dropIfExists(LawyerCityContract::TABLE);
    }
};
