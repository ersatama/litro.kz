<?php

use App\Domain\Contracts\EcoServiceContract;
use App\Domain\Contracts\Contract;
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
        Schema::create(EcoServiceContract::TABLE, function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger(Contract::IMAGE_ID)->nullable();
            $table->unsignedInteger(Contract::POSITION)->default(1);
            $table->string(Contract::STATUS)->nullable();
            $table->string(Contract::TYPE)->nullable();
            $table->string(Contract::TITLE)->nullable();
            $table->string(Contract::TITLE_KZ)->nullable();
            $table->string(Contract::TITLE_EN)->nullable();
            $table->string(Contract::DESCRIPTION)->nullable();
            $table->string(Contract::DESCRIPTION_KZ)->nullable();
            $table->string(Contract::DESCRIPTION_EN)->nullable();
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
        Schema::dropIfExists(EcoServiceContract::TABLE);
    }
};
