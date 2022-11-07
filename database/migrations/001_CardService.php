<?php

use App\Domain\Contracts\CardServiceContract;
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
        Schema::create(CardServiceContract::TABLE, function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger(Contract::CARD_ID);
            $table->unsignedInteger(Contract::SERVICE_ID);
            $table->string(Contract::TITLE)->nullable();
            $table->string(Contract::TITLE_KZ)->nullable();
            $table->string(Contract::TITLE_EN)->nullable();
            $table->unsignedInteger(Contract::POSITION);
            $table->text(Contract::VALUE)->nullable();
            $table->boolean(Contract::IS_CHOOSEABLE)->default(false)->nullable();
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
        Schema::dropIfExists(CardServiceContract::TABLE);
    }
};
