<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        // 1. First, find and drop ALL foreign key constraints referencing instructors.id
        // Example for a table named 'courses':
        Schema::table('loads', function (Blueprint $table) {
            $table->dropForeign(['instructor_id']); // Drop foreign key constraint
        });

        // 2. Modify instructors table
        Schema::table('instructors', function (Blueprint $table) {
            $table->dropPrimary(); // Drops primary key on 'id'
            $table->dropColumn('id'); // Remove the auto-increment column
        });

        // 3. Set new primary key
        Schema::table('instructors', function (Blueprint $table) {
            $table->string('instructor_id')->primary()->change(); // Make instructor_id the PK
        });

        // 4. Recreate foreign keys with new reference
        Schema::table('loads', function (Blueprint $table) {
            $table->foreign('instructor_id')
                  ->references('instructor_id')
                  ->on('instructors')
                  ->onDelete('cascade'); // Add proper cascade rules
        });

        Schema::enableForeignKeyConstraints();
    }

    public function down()
    {
        Schema::disableForeignKeyConstraints();

        // 1. Drop foreign keys first
        Schema::table('loads', function (Blueprint $table) {
            $table->dropForeign(['instructor_id']);
        });

        // 2. Revert instructors table
        Schema::table('instructors', function (Blueprint $table) {
            $table->dropPrimary(); // Drop PK on instructor_id
            $table->id()->first(); // Recreate auto-increment id
            $table->dropUnique('instructors_instructor_id_unique'); // Only if it exists
        });

        // 3. Restore old foreign key
        Schema::table('loads', function (Blueprint $table) {
            $table->foreign('instructor_id')
                  ->references('id')
                  ->on('instructors');
        });

        Schema::enableForeignKeyConstraints();
    }
};