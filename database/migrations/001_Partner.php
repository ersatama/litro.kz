<?php

use App\Domain\Contracts\Contract;
use App\Domain\Contracts\PartnerContract;
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
        Schema::create(PartnerContract::TABLE, function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger(Contract::IMAGE_ID)->nullable();
            $table->string(Contract::NAME)->nullable();
            $table->unsignedInteger(Contract::POSITION)->nullable();
            $table->text(Contract::LINK)->nullable();
            $table->text(Contract::TOKEN)->nullable();
            $table->boolean(Contract::IS_ACTIVE)->default(true);
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
        Schema::dropIfExists(PartnerContract::TABLE);
    }
};
