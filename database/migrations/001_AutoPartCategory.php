<?php

use App\Domain\Contracts\AutoPartCategoryContract;
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
        Schema::create(AutoPartCategoryContract::TABLE, function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger(Contract::PARENT_ID)->nullable();
            $table->unsignedInteger(Contract::POSITION)->default(1);
            $table->string(Contract::TITLE)->nullable();
            $table->string(Contract::TITLE_KZ)->nullable();
            $table->string(Contract::TITLE_EN)->nullable();
            $table->text(Contract::DESCRIPTION)->nullable();
            $table->text(Contract::DESCRIPTION_KZ)->nullable();
            $table->text(Contract::DESCRIPTION_EN)->nullable();
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
        Schema::dropIfExists(AutoPartCategoryContract::TABLE);
    }
};
