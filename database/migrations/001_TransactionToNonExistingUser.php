<?php

use App\Domain\Contracts\MainContract;
use App\Domain\Contracts\TransactionToNonExistingUserContract;
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
        Schema::create(TransactionToNonExistingUserContract::TABLE, function (Blueprint $table) {
            $table->id();
            $table->float(MainContract::SUM)->nullable();
            $table->string(MainContract::EMAIL)->nullable();
            $table->string(MainContract::PHONE)->nullable();
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
        Schema::dropIfExists(TransactionToNonExistingUserContract::TABLE);
    }
};
