<?php

use App\Domain\Contracts\MainContract;
use App\Domain\Contracts\StockContract;
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
        Schema::create(StockContract::TABLE, function (Blueprint $table) {
            $table->id();
            $table->string(MainContract::IMAGE_ID)->nullable();
            $table->string(MainContract::TITLE)->nullable();
            $table->string(MainContract::TITLE_EN)->nullable();
            $table->string(MainContract::TITLE_KZ)->nullable();
            $table->text(MainContract::DESCRIPTION)->nullable();
            $table->text(MainContract::DESCRIPTION_EN)->nullable();
            $table->text(MainContract::DESCRIPTION_KZ)->nullable();
            $table->boolean(MainContract::IS_ACTIVE)->default(true);
            $table->string(MainContract::CATEGORY)->nullable();
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
        Schema::dropIfExists(StockContract::TABLE);
    }
};
