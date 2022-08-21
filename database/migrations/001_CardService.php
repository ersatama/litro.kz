<?php

use App\Domain\Contracts\CardServiceContract;
use App\Domain\Contracts\MainContract;
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
        Schema::create(CardServiceContract::TABLE, function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger(MainContract::CARD_ID);
            $table->unsignedInteger(MainContract::SERVICE_ID);
            $table->string(MainContract::TITLE)->nullable();
            $table->string(MainContract::TITLE_KZ)->nullable();
            $table->string(MainContract::TITLE_EN)->nullable();
            $table->unsignedInteger(MainContract::POSITION);
            $table->text(MainContract::VALUE)->nullable();
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
        Schema::dropIfExists(CardServiceContract::TABLE);
    }
};
