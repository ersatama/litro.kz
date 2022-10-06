<?php

use App\Domain\Contracts\Contract;
use App\Domain\Contracts\StockImageContract;
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
        Schema::create(StockImageContract::TABLE, function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger(Contract::STOCK_ID)->nullable();
            $table->unsignedBigInteger(Contract::IMAGE_ID)->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->index(Contract::STOCK_ID);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists(StockImageContract::TABLE);
    }
};
