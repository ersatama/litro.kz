<?php

use App\Domain\Contracts\EcoServiceContract;
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
        Schema::create(EcoServiceContract::TABLE, function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger(MainContract::POSITION)->default(1);
            $table->boolean(MainContract::STATUS)->default(true);
            $table->string(MainContract::TYPE)->nullable();
            $table->string(MainContract::TITLE)->nullable();
            $table->string(MainContract::TITLE_KZ)->nullable();
            $table->string(MainContract::TITLE_EN)->nullable();
            $table->string(MainContract::DESCRIPTION)->nullable();
            $table->string(MainContract::DESCRIPTION_KZ)->nullable();
            $table->string(MainContract::DESCRIPTION_EN)->nullable();
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
        Schema::dropIfExists(EcoServiceContract::TABLE);
    }
};
