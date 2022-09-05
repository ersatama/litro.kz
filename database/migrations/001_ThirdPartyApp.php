<?php

use App\Domain\Contracts\MainContract;
use App\Domain\Contracts\ThirdPartyAppContract;
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
        Schema::create(ThirdPartyAppContract::TABLE, function (Blueprint $table) {
            $table->id();
            $table->string(MainContract::KEY)->nullable();
            $table->string(MainContract::NAME)->nullable();
            $table->string(MainContract::PASSWORD)->nullable();
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
        Schema::dropIfExists(ThirdPartyAppContract::TABLE);
    }
};
