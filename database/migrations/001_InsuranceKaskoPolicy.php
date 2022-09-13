<?php

use App\Domain\Contracts\InsuranceKaskoPolicyContract;
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
        Schema::create(InsuranceKaskoPolicyContract::TABLE, function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger(MainContract::USER_ID)->nullable();
            $table->unsignedBigInteger(MainContract::USER_CAR_ID)->nullable();
            $table->unsignedInteger(MainContract::INSURANCE_COMPANY_ID)->nullable();
            $table->string(MainContract::STATUS)->nullable();
            $table->unsignedInteger(MainContract::PRICE)->default(0);
            $table->unsignedInteger(MainContract::BONUS)->default(0);
            $table->string(MainContract::ERROR_MSG)->nullable();
            $table->json(MainContract::PRODUCTS)->nullable();
            $table->unsignedInteger(MainContract::INSURANCE_PRICE)->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->index(MainContract::USER_ID);
            $table->index(MainContract::INSURANCE_COMPANY_ID);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists(InsuranceKaskoPolicyContract::TABLE);
    }
};
