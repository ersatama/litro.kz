<?php

use App\Domain\Contracts\InsuranceCompanyRequestLogContract;
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
        Schema::create(InsuranceCompanyRequestLogContract::TABLE, function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger(MainContract::INSURANCE_COMPANY_ID)->nullable();
            $table->string(MainContract::INSURANCE_COMPANY_REQUEST_TYPE)->nullable();
            $table->string(MainContract::ACTION_TYPE)->nullable();
            $table->string(MainContract::REQUEST_URL)->nullable();
            $table->char(MainContract::RESPONSE_STATUS,3)->nullable();
            $table->json(MainContract::RESPONSE_BODY)->nullable();
            $table->json(MainContract::REQUEST_BODY)->nullable();
            $table->timestamps();
            $table->softDeletes();
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
        Schema::dropIfExists(InsuranceCompanyRequestLogContract::TABLE);
    }
};
