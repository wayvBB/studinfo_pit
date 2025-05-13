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
        // Only drop the column if it exists — check must be done outside the closure
        if (Schema::hasColumn('enrolls', 'subject_id')) {
            Schema::table('enrolls', function (Blueprint $table) {
                $table->dropColumn('subject_id');
            });
        }

        // Add subject_code if it doesn't already exist
        if (!Schema::hasColumn('enrolls', 'subject_code')) {
            Schema::table('enrolls', function (Blueprint $table) {
                $table->string('subject_code');
            });
        }

        // Make student_id unique if it exists
        if (Schema::hasColumn('enrolls', 'student_id')) {
            Schema::table('enrolls', function (Blueprint $table) {
                $table->string('student_id')->unique()->change();
            });
        }

        // Add the foreign key (do this last)
        Schema::table('enrolls', function (Blueprint $table) {
            $table->foreign('subject_code')->references('subject_code')->on('subjects')->onDelete('cascade');
        });
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('enrolls', function (Blueprint $table) {
            // Revert the changes made in the up method
            $table->dropForeign(['subject_code']);
            $table->dropColumn('subject_code');
            $table->unsignedBigInteger('subject_id');
            $table->string('student_id')->change();  // Remove unique constraint from student_id

            // Optionally add back the previous foreign key and subject_id if needed
        });
    }
};
