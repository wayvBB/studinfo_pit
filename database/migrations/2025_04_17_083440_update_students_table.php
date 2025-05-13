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
        Schema::table('students', function (Blueprint $table) {
            // Drop old 'name' column first
            $table->dropColumn('name');

            // Add new columns
            $table->string('firstname')->after('student_id');
            $table->string('lastname')->after('firstname');
            $table->string('email')->unique()->after('lastname');
            $table->string('contact_number')->nullable()->after('address');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('students', function (Blueprint $table) {
            // Revert the new columns
            $table->dropColumn('firstname');
            $table->dropColumn('lastname');
            $table->dropColumn('email');
            $table->dropColumn('contact_number');

            // Restore the old 'name' column
            $table->string('name')->after('student_id');
        });
    }
};
