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
        Schema::create('universities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('address');
            $table->string('phone_number');
            //latitude
            $table->decimal('latitude' , 10, 8);
            //longitude
            $table->decimal('longitude', 11, 8);
            //radius_km
            $table->integer('radius_km');
            //time_in (format: 08:00)
            $table->time('time_in');
            //time_out (format: 17:00)
            $table->time('time_out');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('universities');
    }
};
