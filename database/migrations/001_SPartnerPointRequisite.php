<?php

use App\Domain\Contracts\Contract;
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
            $table->unsignedInteger(Contract::S_PARTNER_POINT_ID)->nullable();
            $table->text(Contract::ADDRESS)->nullable();
            $table->string(Contract::TITLE)->nullable();
            $table->string(Contract::BIN)->nullable();
            $table->string(Contract::IIK)->nullable();
            $table->string(Contract::BIK)->nullable();
            $table->string(Contract::BANK)->nullable();
            $table->string(Contract::INFO)->nullable();
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
