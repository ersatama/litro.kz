<?php

use App\Domain\Contracts\MainContract;
use App\Domain\Contracts\SPartnerServiceCategoryContract;
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
        Schema::create(SPartnerServiceCategoryContract::TABLE, function (Blueprint $table) {
            $table->id();
            $table->string(MainContract::NAME)->nullable();
            $table->string(MainContract::NAME_KZ)->nullable();
            $table->string(MainContract::NAME_EN)->nullable();
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
        Schema::dropIfExists(SPartnerServiceCategoryContract::TABLE);
    }
};
