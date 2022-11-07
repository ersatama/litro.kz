<?php

use App\Domain\Contracts\Contract;
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
            $table->unsignedBigInteger(Contract::IMAGE_ID)->nullable();
            $table->unsignedInteger(Contract::CITY_ID)->nullable();
            $table->string(Contract::TITLE)->nullable();
            $table->string(Contract::LEGAL_TITLE)->nullable();
            $table->text(Contract::DESCRIPTION)->nullable();
            $table->string(Contract::MANAGER_NAME)->nullable();
            $table->text(Contract::ADDRESS)->nullable();
            $table->string(Contract::LAT)->nullable();
            $table->string(Contract::LONG)->nullable();
            $table->string(Contract::INFO)->nullable();
            $table->string(Contract::PHONE)->nullable();
            $table->string(Contract::EMAIL)->nullable();
            $table->string(Contract::PASSWORD)->nullable();
            $table->unsignedInteger(Contract::BONUS_PERCENT)->nullable();
            $table->unsignedInteger(Contract::DISCOUNT)->nullable();
            $table->boolean(Contract::SELL_CARD)->default(false)->nullable();
            $table->boolean(Contract::ADS_AND_SELL)->default(false)->nullable();
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
