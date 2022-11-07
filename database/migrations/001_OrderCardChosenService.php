<?php

use App\Domain\Contracts\Contract;
use App\Domain\Contracts\OrderCardChosenServiceContract;
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
        Schema::create(OrderCardChosenServiceContract::TABLE, function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger(Contract::ORDER_CARD_ID)->nullable();
            $table->unsignedBigInteger(Contract::SERVICE_ID)->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->index(Contract::ORDER_CARD_ID);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists(OrderCardChosenServiceContract::TABLE);
    }
};
