<?php

use App\Domain\Contracts\MainContract;
use App\Domain\Contracts\SPartnerPointContract;
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
        Schema::create(SPartnerPointContract::TABLE, function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger(MainContract::IMAGE_ID)->nullable();
            $table->unsignedInteger(MainContract::CITY_ID)->nullable();
            $table->string(MainContract::TITLE)->nullable();
            $table->string(MainContract::LEGAL_TITLE)->nullable();
            $table->text(MainContract::DESCRIPTION)->nullable();
            $table->string(MainContract::MANAGER_NAME)->nullable();
            $table->text(MainContract::ADDRESS)->nullable();
            $table->string(MainContract::LAT)->nullable();
            $table->string(MainContract::LONG)->nullable();
            $table->string(MainContract::INFO)->nullable();
            $table->string(MainContract::PHONE)->nullable();
            $table->string(MainContract::EMAIL)->nullable();
            $table->string(MainContract::PASSWORD)->nullable();
            $table->unsignedInteger(MainContract::BONUS_PERCENT)->nullable();
            $table->unsignedInteger(MainContract::DISCOUNT)->nullable();
            $table->boolean(MainContract::SELL_CARD)->default(false)->nullable();
            $table->boolean(MainContract::ADS_AND_SELL)->default(false)->nullable();
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
        Schema::dropIfExists(SPartnerPointContract::TABLE);
    }
};
