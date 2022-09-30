<?php

use App\Domain\Contracts\InsuranceSelectOptionContract;
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
        Schema::create(InsuranceSelectOptionContract::TABLE, function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger(Contract::INSURANCE_SELECT_ID)->nullable();
            $table->string(Contract::FILTER_NAME)->nullable();
            $table->string(Contract::NAME)->nullable();
            $table->string(Contract::NAME_KZ)->nullable();
            $table->string(Contract::NAME_EN)->nullable();
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
        Schema::dropIfExists(InsuranceSelectOptionContract::TABLE);
    }
};
