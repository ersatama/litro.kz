<?php

use App\Domain\Contracts\InsuranceCompanyRequestLogContract;
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
        Schema::create(InsuranceCompanyRequestLogContract::TABLE, function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger(Contract::INSURANCE_COMPANY_ID)->nullable();
            $table->string(Contract::INSURANCE_COMPANY_REQUEST_TYPE)->nullable();
            $table->string(Contract::ACTION_TYPE)->nullable();
            $table->string(Contract::REQUEST_URL)->nullable();
            $table->char(Contract::RESPONSE_STATUS,3)->nullable();
            $table->json(Contract::RESPONSE_BODY)->nullable();
            $table->json(Contract::REQUEST_BODY)->nullable();
            $table->timestamps();
            $table->softDeletes();
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
        Schema::dropIfExists(InsuranceCompanyRequestLogContract::TABLE);
    }
};
