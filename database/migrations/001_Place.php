<?php

use App\Domain\Contracts\MainContract;
use App\Domain\Contracts\PlaceContract;
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
        Schema::create(PlaceContract::TABLE, function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger(MainContract::SERVICE_ID)->nullable();
            $table->unsignedInteger(MainContract::CITY_ID)->nullable();
            $table->double(MainContract::LAT)->nullable();
            $table->double(MainContract::LONG)->nullable();
            $table->text(MainContract::ADDRESS)->nullable();
            $table->string(MainContract::TITLE)->nullable();
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
        Schema::dropIfExists(PlaceContract::TABLE);
    }
};
