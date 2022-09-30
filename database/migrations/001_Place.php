<?php

use App\Domain\Contracts\Contract;
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
            $table->unsignedInteger(Contract::SERVICE_ID)->nullable();
            $table->unsignedInteger(Contract::CITY_ID)->nullable();
            $table->double(Contract::LAT)->nullable();
            $table->double(Contract::LONG)->nullable();
            $table->text(Contract::ADDRESS)->nullable();
            $table->string(Contract::TITLE)->nullable();
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
