<?php

use App\Domain\Contracts\MainContract;
use App\Domain\Contracts\PartnerContract;
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
        Schema::create(PartnerContract::TABLE, function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger(MainContract::IMAGE_ID)->nullable();
            $table->string(MainContract::NAME)->nullable();
            $table->unsignedInteger(MainContract::POSITION)->nullable();
            $table->text(MainContract::LINK)->nullable();
            $table->text(MainContract::TOKEN)->nullable();
            $table->boolean(MainContract::IS_ACTIVE)->default(true);
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
        Schema::dropIfExists(PartnerContract::TABLE);
    }
};
