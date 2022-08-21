<?php

use App\Domain\Contracts\CardRangeContract;
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
        Schema::create(CardRangeContract::TABLE, function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger(MainContract::CITY_ID)->nullable();
            $table->unsignedBigInteger(MainContract::CARD_ID);
            $table->unsignedBigInteger(MainContract::CURRENT_SYNCED)->default(0);
            $table->text(MainContract::LEGAL_PERSON)->nullable();
            $table->string(MainContract::C_FROM);
            $table->string(MainContract::C_TO);
            $table->boolean(MainContract::STATUS)->default(true);
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
        Schema::dropIfExists(CardRangeContract::TABLE);
    }
};
