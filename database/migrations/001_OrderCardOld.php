<?php

use App\Domain\Contracts\Contract;
use App\Domain\Contracts\OrderCardOldContract;
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
        Schema::create(OrderCardOldContract::TABLE, function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger(Contract::ORDER_CARD_ID)->nullable();
            $table->unsignedBigInteger(Contract::ORDER_CARD_ID_OLD)->nullable();
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
        Schema::dropIfExists(OrderCardOldContract::TABLE);
    }
};
