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
        /*Schema::create('enrolls', function (Blueprint $table) {
            $table->foreignId('student_id')->constrained()->onDelete('cascade');
            $table->foreignId('subject_id')->constrained()->onDelete('cascade');
            $table->date('enrollment_date');
            $table->timestamps();
            $table->primary(['student_id', 'subject_id']);
        });*/
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        /*Schema::dropIfExists('enrolls');*/
    }
};
