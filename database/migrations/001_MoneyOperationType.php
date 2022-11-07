<?php

use App\Domain\Contracts\Contract;
use App\Domain\Contracts\MoneyOperationTypeContract;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create(MoneyOperationTypeContract::TABLE, function (Blueprint $table) {
            $table->id();
            $table->string(Contract::FILTER)->nullable();
            $table->string(Contract::TITLE)->nullable();
            $table->string(Contract::TITLE_KZ)->nullable();
            $table->string(Contract::TITLE_EN)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists(MoneyOperationTypeContract::TABLE);
    }
};
