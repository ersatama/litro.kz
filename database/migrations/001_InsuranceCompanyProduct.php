<?php

use App\Domain\Contracts\InsuranceCompanyProductContract;
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
        Schema::create(InsuranceCompanyProductContract::TABLE, function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger(MainContract::INSURANCE_CATEGORY_ID)->nullable();
            $table->unsignedInteger(MainContract::INSURANCE_COMPANY_ID)->nullable();
            $table->string(MainContract::FILTER_NAME)->nullable();
            $table->string(MainContract::NAME)->nullable();
            $table->string(MainContract::NAME_KZ)->nullable();
            $table->string(MainContract::NAME_EN)->nullable();
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
        Schema::dropIfExists(InsuranceCompanyProductContract::TABLE);
    }
};
