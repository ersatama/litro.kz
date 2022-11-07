<?php

use App\Domain\Contracts\Contract;
use App\Domain\Contracts\UserImageContract;
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
        Schema::create(UserImageContract::TABLE, function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger(Contract::USER_ID)->nullable();
            $table->unsignedBigInteger(Contract::IMAGE_ID)->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->index(Contract::USER_ID);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists(UserImageContract::TABLE);
    }
};
