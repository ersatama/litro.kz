<?php

use App\Domain\Contracts\InsuranceImageContract;
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
        Schema::create(InsuranceImageContract::TABLE, function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger(MainContract::USER_ID)->nullable();
            $table->unsignedInteger(MainContract::INSURANCE_COMPANY_ID)->nullable();
            $table->unsignedInteger(MainContract::POLICY_ID)->nullable();
            $table->string(MainContract::TYPE)->nullable();
            $table->string(MainContract::KEY)->nullable();
            $table->string(MainContract::EXTENSION)->nullable();
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
        Schema::dropIfExists(InsuranceImageContract::TABLE);
    }
};
