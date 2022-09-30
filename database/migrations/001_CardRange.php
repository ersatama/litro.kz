<?php

use App\Domain\Contracts\CardRangeContract;
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
        Schema::create(CardRangeContract::TABLE, function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger(Contract::CITY_ID)->nullable();
            $table->unsignedBigInteger(Contract::CARD_ID);
            $table->unsignedBigInteger(Contract::CURRENT_SYNCED)->default(0);
            $table->text(Contract::LEGAL_PERSON)->nullable();
            $table->string(Contract::C_FROM);
            $table->string(Contract::C_TO);
            $table->boolean(Contract::STATUS)->default(true);
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
