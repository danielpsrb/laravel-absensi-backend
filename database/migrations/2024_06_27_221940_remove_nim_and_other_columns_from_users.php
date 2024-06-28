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
            // Drop foreign key constraints
            $table->dropForeign(['faculty_id']);
            $table->dropForeign(['department_id']);

            // Drop the columns
            $table->dropColumn(['faculty_id', 'department_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Add the columns back
            $table->foreignId('faculty_id')->constrained();
            $table->foreignId('department_id')->constrained();
        });
    }
};
