<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name_az');
            $table->string('name_en');
            $table->string('name_ru');
            $table->string('slug_az')->unique();
            $table->string('slug_en')->unique();
            $table->string('slug_ru')->unique();
            $table->text('image');
            $table->string('meta_title_az')->nullable();
            $table->string('meta_title_en')->nullable();
            $table->string('meta_title_ru')->nullable();
            $table->text('meta_description_az')->nullable();
            $table->text('meta_description_en')->nullable();
            $table->text('meta_description_ru')->nullable();
            $table->string('alt_image_az')->nullable();
            $table->string('alt_image_en')->nullable();
            $table->string('alt_image_ru')->nullable();
            $table->string('image_title_az')->nullable();
            $table->string('image_title_en')->nullable();
            $table->string('image_title_ru')->nullable();
            $table->text('power_and_speed_az')->nullable();
            $table->text('power_and_speed_en')->nullable();
            $table->text('power_and_speed_ru')->nullable();
            $table->text('battery_and_charge_az')->nullable();
            $table->text('battery_and_charge_en')->nullable();
            $table->text('battery_and_charge_ru')->nullable();
            $table->text('size_az')->nullable();
            $table->text('size_en')->nullable();
            $table->text('size_ru')->nullable();
            $table->text('features_az')->nullable();
            $table->text('features_en')->nullable();
            $table->text('features_ru')->nullable();
            $table->boolean('status');
            $table->boolean('sale_status');
            $table->string('price')->nullable();
            $table->string('engine_volume')->nullable();
            $table->string('expence')->nullable();
            $table->string('horse_power')->nullable();
            $table->string('acceleration')->nullable();
            $table->string('battery')->nullable();
            $table->string('charge')->nullable();
            $table->string('max_distance')->nullable();
            $table->unsignedBigInteger('brend_id')->nullable();
            $table->foreign('brend_id')->references('id')->on('brends')->onDelete('set null');
            $table->unsignedBigInteger('model_id')->nullable();
            $table->foreign('model_id')->references('id')->on('models')->onDelete('set null');
            $table->unsignedBigInteger('fuel_id')->nullable();
            $table->foreign('fuel_id')->references('id')->on('fuels')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
