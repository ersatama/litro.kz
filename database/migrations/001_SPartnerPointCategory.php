<?php

use App\Domain\Contracts\MainContract;
use App\Domain\Contracts\SPartnerPointCategoryContract;
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
        Schema::create(SPartnerPointCategoryContract::TABLE, function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger(MainContract::S_PARTNER_POINT_ID)->nullable();
            $table->unsignedInteger(MainContract::S_PARTNER_SERVICE_CATEGORY_ID)->nullable();
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
        Schema::dropIfExists(SPartnerPointCategoryContract::TABLE);
    }
};
