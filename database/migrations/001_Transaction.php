<?php

use App\Domain\Contracts\MainContract;
use App\Domain\Contracts\TransactionContract;
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
        Schema::create(TransactionContract::TABLE, function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger(MainContract::USER_FROM)->nullable();
            $table->unsignedInteger(MainContract::USER_TO)->nullable();
            $table->float(MainContract::BALANCE)->nullable();
            $table->float(MainContract::DELTA_BALANCE)->nullable();
            $table->text(MainContract::COMMENT)->nullable();
            $table->string(MainContract::TYPE)->nullable();
            $table->string(MainContract::EMAIL)->nullable();
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
        Schema::dropIfExists(TransactionContract::TABLE);
    }
};
