<?php

use App\Domain\Contracts\MainContract;
use App\Domain\Contracts\ServiceLimitContract;
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
        Schema::create(ServiceLimitContract::TABLE, function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger(MainContract::SERVICE_ID)->nullable();
            $table->unsignedBigInteger(MainContract::CARD_ID)->nullable();
            $table->tinyInteger(MainContract::LIMIT)->default(-1);
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
        Schema::dropIfExists(ServiceLimitContract::TABLE);
    }
};
