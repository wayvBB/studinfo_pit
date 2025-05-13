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
        Schema::create('loads', function (Blueprint $table) {
            // Reduced length strings for composite key
            $table->string('instructor_id', 50);  // Reduced from default 255
            $table->string('subject_code', 50);   // Reduced from default 255
            $table->string('semester', 20);       // Short code like "Fall2024"
            $table->string('school_year', 9);     // Format: "2024-2025"
            $table->timestamps();

            // Foreign key constraints (must match the exact data types)
            $table->foreign('instructor_id')
                  ->references('instructor_id')
                  ->on('instructors')
                  ->onDelete('cascade');
            
            $table->foreign('subject_code')
                  ->references('subject_code')
                  ->on('subjects')
                  ->onDelete('cascade');

            // Composite primary key (now within MySQL's limit)
            $table->primary([
                'instructor_id', 
                'subject_code',
                'semester', 
                'school_year'
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loads');
    }
};