<?php

use App\Domain\Contracts\CardContract;
use App\Domain\Contracts\MainContract;
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
        Schema::create(CardContract::TABLE, function (Blueprint $table) {
            $table->id();
            $table->string(MainContract::COLORS)->nullable();
            $table->unsignedBigInteger(MainContract::CATEGORY_ID)->nullable();
            $table->unsignedInteger(MainContract::IMAGE_ID)->nullable();
            $table->unsignedInteger(MainContract::IMAGE)->nullable();
            $table->unsignedInteger(MainContract::ICON)->nullable();
            $table->text(MainContract::DESCRIPTION)->nullable();
            $table->text(MainContract::DESCRIPTION_KZ)->nullable();
            $table->text(MainContract::DESCRIPTION_EN)->nullable();
            $table->text(MainContract::DETAIL)->nullable();
            $table->text(MainContract::DETAIL_KZ)->nullable();
            $table->text(MainContract::DETAIL_EN)->nullable();
            $table->string(MainContract::TITLE)->nullable();
            $table->string(MainContract::TITLE_KZ)->nullable();
            $table->string(MainContract::TITLE_EN)->nullable();
            $table->unsignedInteger(MainContract::PRICE)->nullable();
            $table->unsignedInteger(MainContract::RANK)->nullable();
            $table->unsignedInteger(MainContract::ALLOWED_DRIVERS)->default(1);
            $table->unsignedInteger(MainContract::ALLOWED_CARS)->default(1);
            $table->boolean(MainContract::IS_ACTIVE)->default(true);
            $table->unsignedInteger(MainContract::CLIENT_DISCOUNT)->nullable();
            $table->integer(MainContract::PRICE_MONTHLY)->nullable();
            $table->unsignedInteger(MainContract::PRICE_MONTHLY_FIRST_MONTH)->nullable();
            $table->unsignedInteger(MainContract::REFERRAL_PRICE_MONTHLY)->nullable();
            $table->unsignedInteger(MainContract::REFERRAL_PRICE_MONTHLY_FIRST_MONTH)->nullable();
            $table->boolean(MainContract::IS_FOR_CORPORATE_USE)->default(true);
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
        Schema::dropIfExists(CardContract::TABLE);
    }
};
