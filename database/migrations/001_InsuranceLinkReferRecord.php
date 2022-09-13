<?php

use App\Domain\Contracts\InsuranceLinkReferRecordContract;
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
        Schema::create(InsuranceLinkReferRecordContract::TABLE, function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger(MainContract::USER_ID)->nullable();
            $table->unsignedInteger(MainContract::INSURANCE_COMPANY_ID)->nullable();
            $table->string(MainContract::LINK)->nullable();
            $table->unsignedInteger(MainContract::BONUS_PERCENT)->default(0);
            $table->string(MainContract::TYPE)->nullable();
            $table->unsignedInteger(MainContract::SUM)->nullable();
            $table->string(MainContract::REGION)->nullable();
            $table->unsignedFloat(MainContract::BONUS_MALUS)->nullable();
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
        Schema::dropIfExists(InsuranceLinkReferRecordContract::TABLE);
    }
};
