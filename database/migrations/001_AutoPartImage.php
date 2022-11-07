<?php

use App\Domain\Contracts\AutoPartImageContract;
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
        Schema::create(AutoPartImageContract::TABLE, function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger(Contract::AUTO_PART_ID)->nullable();
            $table->unsignedBigInteger(Contract::IMAGE_ID)->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->index(Contract::AUTO_PART_ID);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists(AutoPartImageContract::TABLE);
    }
};
