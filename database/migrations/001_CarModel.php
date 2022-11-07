<?php

use App\Domain\Contracts\CarModelContract;
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
        Schema::create(CarModelContract::TABLE, function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger(Contract::CAR_BRAND_ID);
            $table->string(Contract::TITLE);
            $table->timestamps();
            $table->softDeletes();
            $table->index(Contract::CAR_BRAND_ID);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists(CarModelContract::TABLE);
    }
};
