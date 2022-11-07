<?php

use App\Domain\Contracts\Contract;
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
            $table->string(Contract::IMAGE_ID)->nullable();
            $table->string(Contract::TITLE)->nullable();
            $table->string(Contract::TITLE_EN)->nullable();
            $table->string(Contract::TITLE_KZ)->nullable();
            $table->text(Contract::DESCRIPTION)->nullable();
            $table->text(Contract::DESCRIPTION_EN)->nullable();
            $table->text(Contract::DESCRIPTION_KZ)->nullable();
            $table->boolean(Contract::IS_ACTIVE)->default(true)->nullable();
            $table->string(Contract::CATEGORY)->nullable();
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
