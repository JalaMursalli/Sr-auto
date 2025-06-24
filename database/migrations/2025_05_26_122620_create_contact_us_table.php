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
        Schema::create('contact_us', function (Blueprint $table) {
            $table->id();
            $table->string( 'sale_address_az')->nullable();
            $table->string( 'sale_address_en')->nullable();
            $table->string( 'sale_address_ru')->nullable();
            $table->string('sale_contact_number1')->nullable();
            $table->string('sale_contact_number2')->nullable();
            $table->string('sale_contact_number3')->nullable();
            $table->string('sale_email')->nullable();
            $table->string( 'service_address_az')->nullable();
            $table->string( 'service_address_en')->nullable();
            $table->string( 'service_address_ru')->nullable();
            $table->string('service_contact_number1')->nullable();
            $table->string('service_contact_number2')->nullable();
            $table->string('service_contact_number3')->nullable();
            $table->string('service_email')->nullable();
            $table->string('waze_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_us');
    }
};
