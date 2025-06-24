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
        Schema::create('brend_socials', function (Blueprint $table) {
            $table->id();
             $table->string('icon');
            $table->text('url');
            $table->unsignedBigInteger('brend_id');
            $table->foreign('brend_id')->references('id')->on('brends')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brend_socials');
    }
};
