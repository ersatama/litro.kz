<?php

use App\Domain\Contracts\MainContract;
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
            $table->string(MainContract::TITLE)->nullable();
            $table->string(MainContract::TITLE_KZ)->nullable();
            $table->string(MainContract::TITLE_EN)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists(MoneyOperationTypeContract::TABLE);
    }
};