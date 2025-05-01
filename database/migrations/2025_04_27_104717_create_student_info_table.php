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
    {Schema::create('student_info', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
        $table->string('first_name');
        $table->string('middle_name')->nullable(); // Should be nullable
        $table->string('last_name');
        $table->string('student_id')->unique();
        $table->foreignId('course_category_id')->constrained('course_categories')->onDelete('cascade');
        $table->enum('year_level', ['1st year', '2nd year', '3rd year', '4th year'])->nullable();
        $table->date('dob');
        $table->text('address')->nullable();
        $table->enum('gender', ['male', 'female', 'other'])->nullable();
        $table->enum('civil_status', ['single', 'married', 'other'])->default('single');
    
        $table->timestamps();
    });
    
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_info');
    }
};
