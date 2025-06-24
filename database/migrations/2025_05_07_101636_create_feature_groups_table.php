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
        // Migration for feature_groups table
        Schema::create('feature_groups', function (Blueprint $table) {
            $table->id();
            $table->string('name_az');
            $table->string('name_en');
            $table->string('name_ru');
            $table->timestamps();
        });

        // Migration for features table
        Schema::create('features', function (Blueprint $table) {
            $table->id();
            $table->foreignId('feature_group_id')->constrained();
            $table->string('key_az');
            $table->string('key_en');
            $table->string('key_ru');
            $table->string('value_az');
            $table->string('value_en');
            $table->string('value_ru');
            $table->timestamps();
        });

        // Migration for product_feature pivot table
        Schema::create('product_feature', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained();
            $table->foreignId('feature_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feature_groups');
    }
};
