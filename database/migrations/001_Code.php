<?php

use App\Domain\Contracts\CodeContract;
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
        Schema::create(CodeContract::TABLE, function (Blueprint $table) {
            $table->id();
            $table->string(MainContract::PHONE)->nullable()->unique();
            $table->string(MainContract::EMAIL)->nullable()->unique();
            $table->char(MainContract::CODE,4)->nullable();
            $table->boolean(MainContract::STATUS)->default(false);
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
        Schema::dropIfExists(CodeContract::TABLE);
    }
};
