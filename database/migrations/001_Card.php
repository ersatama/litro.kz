<?php

use App\Domain\Contracts\CardContract;
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
        Schema::create(CardContract::TABLE, function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger(Contract::CARD_CATEGORY_ID)->nullable();
            $table->unsignedInteger(Contract::IMAGE_ID)->nullable();
            $table->unsignedInteger(Contract::IMG)->nullable();
            $table->unsignedInteger(Contract::ICON)->nullable();
            $table->unsignedInteger(Contract::ICON_SELECTED)->nullable();
            $table->string(Contract::COLORS)->nullable();
            $table->text(Contract::DESCRIPTION)->nullable();
            $table->text(Contract::DESCRIPTION_KZ)->nullable();
            $table->text(Contract::DESCRIPTION_EN)->nullable();
            $table->text(Contract::DETAIL)->nullable();
            $table->text(Contract::DETAIL_KZ)->nullable();
            $table->text(Contract::DETAIL_EN)->nullable();
            $table->string(Contract::TITLE)->nullable();
            $table->string(Contract::TITLE_KZ)->nullable();
            $table->string(Contract::TITLE_EN)->nullable();
            $table->unsignedInteger(Contract::PRICE)->nullable();
            $table->unsignedInteger(Contract::RANK)->nullable();
            $table->unsignedInteger(Contract::ALLOWED_DRIVERS)->default(1);
            $table->unsignedInteger(Contract::ALLOWED_CARS)->default(1);
            $table->boolean(Contract::IS_ACTIVE)->default(true);
            $table->unsignedInteger(Contract::CLIENT_DISCOUNT)->nullable();
            $table->integer(Contract::PRICE_MONTHLY)->nullable();
            $table->string(Contract::PRICE_MONTHLY_FIRST_MONTH)->nullable();
            $table->string(Contract::REFERRAL_PRICE_MONTHLY)->nullable();
            $table->string(Contract::REFERRAL_PRICE_MONTHLY_FIRST_MONTH)->nullable();
            $table->boolean(Contract::IS_FOR_CORPORATE_USE)->default(true);
            $table->unsignedInteger(Contract::ALLOWED_CHOOSEABLE_SERVICES)->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->index(Contract::CARD_CATEGORY_ID);
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
