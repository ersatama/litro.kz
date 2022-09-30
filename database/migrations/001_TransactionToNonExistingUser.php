<?php

use App\Domain\Contracts\Contract;
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
            $table->float(Contract::SUM)->nullable();
            $table->string(Contract::EMAIL)->nullable();
            $table->string(Contract::PHONE)->nullable();
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
