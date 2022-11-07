<?php

use App\Domain\Contracts\Contract;
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
            $table->unsignedInteger(Contract::USER_FROM)->nullable();
            $table->unsignedInteger(Contract::USER_TO)->nullable();
            $table->float(Contract::BALANCE)->nullable();
            $table->float(Contract::DELTA_BALANCE)->nullable();
            $table->text(Contract::COMMENT)->nullable();
            $table->string(Contract::TYPE)->nullable();
            $table->string(Contract::EMAIL)->nullable();
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
