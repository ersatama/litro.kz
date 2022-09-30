<?php

use App\Domain\Contracts\InsuranceKaskoPolicyContract;
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
        Schema::create(InsuranceKaskoPolicyContract::TABLE, function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger(Contract::USER_ID)->nullable();
            $table->unsignedBigInteger(Contract::USER_CAR_ID)->nullable();
            $table->unsignedInteger(Contract::INSURANCE_COMPANY_ID)->nullable();
            $table->string(Contract::STATUS)->nullable();
            $table->unsignedInteger(Contract::PRICE)->default(0);
            $table->unsignedInteger(Contract::BONUS)->default(0);
            $table->string(Contract::ERROR_MSG)->nullable();
            $table->json(Contract::POLICY_ID)->nullable();
            $table->json(Contract::POLICY_BODY)->nullable();
            $table->json(Contract::PRODUCTS)->nullable();
            $table->unsignedInteger(Contract::INSURANCE_PRICE)->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->index(Contract::USER_ID);
            $table->index(Contract::INSURANCE_COMPANY_ID);
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
