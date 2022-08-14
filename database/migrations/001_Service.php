<?php

use App\Domain\Contracts\MainContract;
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
            $table->unsignedBigInteger(MainContract::IMAGE_ID)->nullable();
            $table->unsignedBigInteger(MainContract::BROWSER_IMAGE_ID)->nullable();
            $table->unsignedBigInteger(MainContract::ADDITIONAL_IMAGE_ID)->nullable();
            $table->unsignedBigInteger(MainContract::SERVICE_TYPE_ID)->nullable();
            $table->string(MainContract::TITLE)->nullable();
            $table->string(MainContract::TITLE_KZ)->nullable();
            $table->string(MainContract::TITLE_EN)->nullable();
            $table->string(MainContract::VIEW)->nullable();
            $table->string(MainContract::VIEW_KZ)->nullable();
            $table->string(MainContract::VIEW_EN)->nullable();
            $table->string(MainContract::TAGLINE)->nullable();
            $table->string(MainContract::TAGLINE_KZ)->nullable();
            $table->string(MainContract::TAGLINE_EN)->nullable();
            $table->text(MainContract::DESCRIPTION)->nullable();
            $table->text(MainContract::DESCRIPTION_KZ)->nullable();
            $table->text(MainContract::DESCRIPTION_EN)->nullable();
            $table->text(MainContract::ANNOTATION)->nullable();
            $table->text(MainContract::ANNOTATION_KZ)->nullable();
            $table->text(MainContract::ANNOTATION_EN)->nullable();
            $table->text(MainContract::NOTE_STARS)->nullable();
            $table->text(MainContract::URL)->nullable();
            $table->unsignedInteger(MainContract::POSITION)->nullable();
            $table->unsignedInteger(MainContract::PRICE)->nullable();
            $table->unsignedInteger(MainContract::CARD_PRICE)->nullable();
            $table->boolean(MainContract::SELECTABLE)->default(true);
            $table->boolean(MainContract::WITHOUT_CARD)->default(true);
            $table->boolean(MainContract::WITH_CARD)->default(true);
            $table->boolean(MainContract::IS_CORPORATE)->default(true);
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
