<?php

use App\Domain\Contracts\Contract;
use App\Domain\Contracts\UserProfileContract;
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
        Schema::create(UserProfileContract::TABLE, function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger(Contract::IMAGE_ID)->nullable();
            $table->unsignedBigInteger(Contract::USER_ID)->nullable();
            $table->unsignedBigInteger(Contract::PARENT_ID)->nullable();
            $table->string(Contract::FIRST_NAME)->nullable();
            $table->string(Contract::MIDDLE_NAME)->nullable();
            $table->string(Contract::LAST_NAME)->nullable();
            $table->string(Contract::LOCALE,32)->nullable();
            $table->unsignedSmallInteger(Contract::GENDER)->nullable();
            $table->string(Contract::DESCRIPTION)->nullable();
            $table->unsignedInteger(Contract::DISCOUNT)->nullable();
            $table->unsignedInteger(Contract::BONUS)->nullable();
            $table->string(Contract::REFERRAL_CODE,25)->nullable();
            $table->unsignedInteger(Contract::BALANCE)->nullable();
            $table->unsignedSmallInteger(Contract::RANK)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists(UserProfileContract::TABLE);
    }
};
