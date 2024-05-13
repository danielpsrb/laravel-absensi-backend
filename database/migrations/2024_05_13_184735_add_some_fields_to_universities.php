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
        Schema::table('universities', function (Blueprint $table) {
            $table->text('description')->nullable();
            $table->text('total_faculty')->nullable();
        });
    }

    /**
     * Reverse the migrmasiations.
     */
    public function down(): void
    {
        Schema::table('universities', function (Blueprint $table) {
            $table->dropColumn('description');
            $table->dropColumn('total_faculty');
            $table->dropColumn('website');
            $table->dropColumn('logo');
        });
    }
};
