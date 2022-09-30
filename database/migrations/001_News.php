<?php

use App\Domain\Contracts\Contract;
use App\Domain\Contracts\NewsContract;
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
        Schema::create(NewsContract::TABLE, function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger(Contract::NEWS_CATEGORY_ID);
            $table->unsignedBigInteger(Contract::IMAGE_ID)->nullable();
            $table->boolean(Contract::IS_ACTIVE)->default(true);
            $table->string(Contract::LINK)->nullable();
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
        Schema::dropIfExists(NewsContract::TABLE);
    }
};
