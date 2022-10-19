<?php

use App\Domain\Contracts\Contract;
use App\Domain\Contracts\NotificationContract;
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
        Schema::create(NotificationContract::TABLE, function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger(Contract::CITY_ID)->nullable();
            $table->string(Contract::TITLE)->nullable();
            $table->string(Contract::TITLE_EN)->nullable();
            $table->string(Contract::TITLE_KZ)->nullable();
            $table->text(Contract::DESCRIPTION)->nullable();
            $table->text(Contract::DESCRIPTION_EN)->nullable();
            $table->text(Contract::DESCRIPTION_KZ)->nullable();
            $table->unsignedBigInteger(Contract::VIEWS)->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->index(Contract::CITY_ID);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists(NotificationContract::TABLE);
    }
};
