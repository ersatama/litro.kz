<?php

use App\Domain\Contracts\AutoPartParamContract;
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
        Schema::create(AutoPartParamContract::TABLE, function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger(Contract::AUTO_PART_CATEGORY_ID);
            $table->unsignedSmallInteger(Contract::AUTO_PART_TYPE_ID);
            $table->string(Contract::FILTER)->nullable();
            $table->string(Contract::TITLE)->nullable();
            $table->string(Contract::TITLE_KZ)->nullable();
            $table->string(Contract::TITLE_EN)->nullable();
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
        Schema::dropIfExists(AutoPartParamContract::TABLE);
    }
};
