<?php

use App\Domain\Contracts\MainContract;
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
            $table->unsignedInteger(MainContract::ROLE_ID)->nullable();
            $table->unsignedBigInteger(MainContract::BITRIX_ID)->nullable();
            $table->string(MainContract::PHONE)->unique()->nullable();
            $table->string(MainContract::EMAIL)->unique()->nullable();
            $table->string(MainContract::IIN)->nullable();
            $table->string(MainContract::FIRST_NAME)->nullable();
            $table->string(MainContract::LAST_NAME)->nullable();
            $table->string(MainContract::PATRONYMIC)->nullable();
            $table->timestamp(MainContract::BIRTHDATE)->nullable();
            $table->string(MainContract::PASSWORD);
            $table->boolean(MainContract::IS_BLOCKED)->default(false);
            $table->enum(MainContract::GENDER,[
                MainContract::MALE,
                MainContract::FEMALE,
            ])->nullable();
            $table->boolean(MainContract::IS_VLIFE_USER)->default(false);
            $table->string(MainContract::VLIFE_USER_ID)->nullable();
            $table->string(MainContract::PROMO_CODE)->nullable();
            $table->unsignedInteger(MainContract::BONUS)->nullable();
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
