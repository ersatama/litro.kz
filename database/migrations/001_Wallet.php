<?php

use App\Domain\Contracts\MainContract;
use App\Domain\Contracts\WalletContract;
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
        Schema::create(WalletContract::TABLE, function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger(MainContract::USER_ID);
            $table->unsignedInteger(MainContract::CURRENCY_ID);
            $table->float(MainContract::BALANCE)->nullable();
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
        Schema::dropIfExists(WalletContract::TABLE);
    }
};
