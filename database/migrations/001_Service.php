<?php

use App\Domain\Contracts\Contract;
use App\Domain\Contracts\ServiceContract;
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
        Schema::create(ServiceContract::TABLE, function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger(Contract::IMAGE_ID)->nullable();
            $table->unsignedBigInteger(Contract::BROWSER_IMAGE_ID)->nullable();
            $table->unsignedBigInteger(Contract::ADDITIONAL_IMAGE_ID)->nullable();
            $table->unsignedBigInteger(Contract::SERVICE_TYPE_ID)->nullable();
            $table->string(Contract::TITLE)->nullable();
            $table->string(Contract::TITLE_KZ)->nullable();
            $table->string(Contract::TITLE_EN)->nullable();
            $table->string(Contract::VIEW)->nullable();
            $table->string(Contract::VIEW_KZ)->nullable();
            $table->string(Contract::VIEW_EN)->nullable();
            $table->string(Contract::TAGLINE)->nullable();
            $table->string(Contract::TAGLINE_KZ)->nullable();
            $table->string(Contract::TAGLINE_EN)->nullable();
            $table->text(Contract::DESCRIPTION)->nullable();
            $table->text(Contract::DESCRIPTION_KZ)->nullable();
            $table->text(Contract::DESCRIPTION_EN)->nullable();
            $table->text(Contract::ANNOTATION)->nullable();
            $table->text(Contract::ANNOTATION_KZ)->nullable();
            $table->text(Contract::ANNOTATION_EN)->nullable();
            $table->text(Contract::NOTE_STARS)->nullable();
            $table->text(Contract::URL)->nullable();
            $table->unsignedInteger(Contract::POSITION)->nullable();
            $table->unsignedInteger(Contract::PRICE)->nullable();
            $table->unsignedInteger(Contract::CARD_PRICE)->nullable();
            $table->boolean(Contract::SELECTABLE)->default(true);
            $table->boolean(Contract::WITHOUT_CARD)->default(true);
            $table->boolean(Contract::WITH_CARD)->default(true);
            $table->boolean(Contract::IS_CORPORATE)->default(true);
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
        Schema::dropIfExists(ServiceContract::TABLE);
    }
};
