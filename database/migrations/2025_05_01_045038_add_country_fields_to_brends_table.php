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
        Schema::table('brends', function (Blueprint $table) {
            $table->string('country_az')->nullable()->after('id');
             $table->string('country_en')->nullable()->after('country_az');
             $table->string('country_ru')->nullable()->after('country_en');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('brends', function (Blueprint $table) {
            $table->dropColumn([ 'country_az', 'country_en', 'country_ru', ]); 
        });
    }
};
