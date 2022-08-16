<?php

use App\Domain\Contracts\AutoPartContract;
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
        Schema::create(AutoPartContract::TABLE, function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger(MainContract::AUTO_PART_CATEGORY_ID)->nullable();
            $table->unsignedBigInteger(MainContract::SUPPLIER_ID)->nullable();
            $table->string(MainContract::PRICE)->nullable();
            $table->string(MainContract::UNIVERSAL)->nullable();
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
        Schema::dropIfExists(AutoPartContract::TABLE);
    }
};
