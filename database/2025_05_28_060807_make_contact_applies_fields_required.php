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
        Schema::table('contact_applies', function (Blueprint $table) {
            $table->string('name')->nullable(false)->change();
            $table->string('surname')->nullable(false)->change();
            $table->string('email')->nullable(false)->change();
            $table->string('application_type')->nullable(false)->change();
            $table->string('text')->nullable(false)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contact_applies', function (Blueprint $table) {
            $table->string('name')->nullable()->change();
            $table->string('surname')->nullable()->change();
            $table->string('email')->nullable()->change();
            $table->string('application_type')->nullable()->change();
            $table->string('text')->nullable()->change();
        });
    }
};
