<?php

use App\Domain\Contracts\AutoPartParamContract;
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
        Schema::create(AutoPartParamContract::TABLE, function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger(MainContract::AUTO_PART_CATEGORY_ID);
            $table->unsignedSmallInteger(MainContract::AUTO_PART_TYPE_ID);
            $table->string(MainContract::FILTER)->nullable();
            $table->string(MainContract::TITLE)->nullable();
            $table->string(MainContract::TITLE_KZ)->nullable();
            $table->string(MainContract::TITLE_EN)->nullable();
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
