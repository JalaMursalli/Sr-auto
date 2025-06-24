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
        Schema::table('products', function (Blueprint $table) {
            $table->integer("battery_number")->nullable();
            $table->integer('horse_number')->nullable();
            $table->integer('acceleration_number')->nullable();
            $table->integer('milage_number')->nullable();
            $table->integer('expenses_number')->nullable();
            $table->integer('engine_number')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn("battery_number");
            $table->dropColumn('horse_number');
            $table->dropColumn('acceleration_number');
            $table->dropColumn('milage_number');
            $table->dropColumn('expenses_number');
            $table->dropColumn('engine_number');

        });
    }
};
