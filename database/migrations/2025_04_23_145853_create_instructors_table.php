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
        Schema::create('instructors', function (Blueprint $table) {
            $table->id();
            $table->string('instructor_id')->unique(); // Custom string PK
            $table->string('department');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email')->unique();
            $table->text('address')->nullable();
            $table->string('contact_number')->nullable();
            $table->enum('gender', ['Male', 'Female', 'Other']);
            $table->date('birthdate');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instructors');
    }
};
