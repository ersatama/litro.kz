<?php

use App\Domain\Contracts\MainContract;
use App\Domain\Contracts\SPartnerPointRequisiteContract;
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
        Schema::create(SPartnerPointRequisiteContract::TABLE, function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger(MainContract::S_PARTNER_POINT_ID)->nullable();
            $table->text(MainContract::ADDRESS)->nullable();
            $table->string(MainContract::TITLE)->nullable();
            $table->string(MainContract::BIN)->nullable();
            $table->string(MainContract::IIK)->nullable();
            $table->string(MainContract::BIK)->nullable();
            $table->string(MainContract::BANK)->nullable();
            $table->string(MainContract::INFO)->nullable();
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
        Schema::dropIfExists(SPartnerPointRequisiteContract::TABLE);
    }
};
