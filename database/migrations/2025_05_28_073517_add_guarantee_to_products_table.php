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
               $table->string('guarantee_az')->nullable();
               $table->string('guarantee_en')->nullable();
               $table->string('guarantee_ru')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
                $table->dropColumn('guarantee_az');
                $table->dropColumn('guarantee_en');
                $table->dropColumn('guarantee_ru');
        });
    }
};
