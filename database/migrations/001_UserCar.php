<?php

use App\Domain\Contracts\MainContract;
use App\Domain\Contracts\UserCarContract;
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
        Schema::create(UserCarContract::TABLE, function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger(MainContract::USER_ID)->nullable();
            $table->unsignedBigInteger(MainContract::CAR_BRAND_ID)->nullable();
            $table->unsignedBigInteger(MainContract::CAR_MODEL_ID)->nullable();
            $table->char(MainContract::YEAR,4)->nullable();
            $table->text(MainContract::REGISTRATION_CERTIFICATE)->nullable();
            $table->string(MainContract::CAR_NUMBER)->nullable();
            $table->string(MainContract::VIN)->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->index(MainContract::USER_ID);
            $table->index(MainContract::CAR_BRAND_ID);
            $table->index(MainContract::CAR_MODEL_ID);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists(UserCarContract::TABLE);
    }
};
