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
        Schema::table('users', function (Blueprint $table) {
            //department atau jurusan
            $table->string('study_program')->nullable();

            //faculty atau fakultas
            $table->string('faculty')->nullable();

            //face_embedding
            $table->text('face_embedding')->nullable();

            //image_url
            $table->string('image_url')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('study_program');
            $table->dropColumn('faculty');
            $table->dropColumn('face_embedding');
            $table->dropColumn('image_url');
        });
    }
};
