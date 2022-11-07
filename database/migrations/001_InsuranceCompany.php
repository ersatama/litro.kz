<?php

use App\Domain\Contracts\InsuranceCompanyContract;
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
        Schema::create(InsuranceCompanyContract::TABLE, function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger(Contract::IMAGE_ID)->nullable();
            $table->string(Contract::NAME)->nullable();
            $table->string(Contract::NAME_KZ)->nullable();
            $table->string(Contract::NAME_EN)->nullable();
            $table->string(Contract::FILTER_NAME)->nullable();
            $table->text(Contract::DESCRIPTION)->nullable();
            $table->text(Contract::DESCRIPTION_KZ)->nullable();
            $table->text(Contract::DESCRIPTION_EN)->nullable();
            $table->string(Contract::OGPO_LINK)->nullable();
            $table->string(Contract::SITE)->nullable();
            $table->double(Contract::BONUS_PERCENT)->nullable();
            $table->boolean(Contract::PROVIDES_REQUIRED_INSURANCE)->default(false);
            $table->boolean(Contract::PROVIDES_ADDITIONAL_INSURANCE)->default(false);
            $table->unsignedInteger(Contract::REQUIRED_INSURANCE_BONUS)->nullable();
            $table->unsignedInteger(Contract::ADDITIONAL_INSURANCE_BONUS)->nullable();
            $table->string(Contract::KASKO_LINK)->nullable();
            $table->string(Contract::API_TOKEN)->nullable();
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
