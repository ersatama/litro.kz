<?php

use App\Domain\Contracts\InsuranceImageContract;
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
        Schema::create(InsuranceImageContract::TABLE, function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger(Contract::USER_ID)->nullable();
            $table->unsignedInteger(Contract::INSURANCE_COMPANY_ID)->nullable();
            $table->unsignedInteger(Contract::POLICY_ID)->nullable();
            $table->unsignedBigInteger(Contract::IMAGE_ID)->nullable();
            $table->string(Contract::TYPE)->nullable();
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
        Schema::dropIfExists(InsuranceImageContract::TABLE);
    }
};
