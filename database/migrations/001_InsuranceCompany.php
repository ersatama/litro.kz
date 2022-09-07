<?php

use App\Domain\Contracts\InsuranceCompanyContract;
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
        Schema::create(InsuranceCompanyContract::TABLE, function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger(MainContract::IMAGE_ID)->nullable();
            $table->string(MainContract::NAME)->nullable();
            $table->string(MainContract::NAME_KZ)->nullable();
            $table->string(MainContract::NAME_EN)->nullable();
            $table->string(MainContract::FILTER_NAME)->nullable();
            $table->text(MainContract::DESCRIPTION)->nullable();
            $table->text(MainContract::DESCRIPTION_KZ)->nullable();
            $table->text(MainContract::DESCRIPTION_EN)->nullable();
            $table->string(MainContract::OGPO_LINK)->nullable();
            $table->string(MainContract::SITE)->nullable();
            $table->double(MainContract::BONUS_PERCENT)->nullable();
            $table->boolean(MainContract::PROVIDES_REQUIRED_INSURANCE)->default(false);
            $table->boolean(MainContract::PROVIDES_ADDITIONAL_INSURANCE)->default(false);
            $table->unsignedInteger(MainContract::REQUIRED_INSURANCE_BONUS)->nullable();
            $table->unsignedInteger(MainContract::ADDITIONAL_INSURANCE_BONUS)->nullable();
            $table->string(MainContract::KASKO_LINK)->nullable();
            $table->string(MainContract::API_TOKEN)->nullable();
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
        Schema::dropIfExists(InsuranceCompanyContract::TABLE);
    }
};
