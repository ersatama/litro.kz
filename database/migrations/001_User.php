<?php

use App\Domain\Contracts\Contract;
use App\Domain\Contracts\UserContract;
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
        Schema::create(UserContract::TABLE, function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger(Contract::ROLE_ID)->nullable();
            $table->unsignedInteger(Contract::CITY_ID)->nullable();
            $table->unsignedBigInteger(Contract::BITRIX_ID)->nullable();
            $table->string(Contract::PHONE)->unique()->nullable();
            $table->string(Contract::EMAIL)->nullable();
            $table->string(Contract::IIN)->nullable();
            $table->string(Contract::FIRST_NAME)->nullable();
            $table->string(Contract::LAST_NAME)->nullable();
            $table->string(Contract::PATRONYMIC)->nullable();
            $table->date(Contract::BIRTHDATE)->nullable();
            $table->string(Contract::PASSWORD)->nullable();
            $table->boolean(Contract::IS_BLOCKED)->default(false)->nullable();
            $table->string(Contract::GENDER)->nullable();
            $table->boolean(Contract::IS_VLIFE_USER)->default(false);
            $table->string(Contract::VLIFE_USER_ID)->nullable();
            $table->string(Contract::PROMO_CODE)->nullable();
            $table->unsignedInteger(Contract::BONUS)->nullable();
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
        Schema::dropIfExists(UserContract::TABLE);
    }
};
