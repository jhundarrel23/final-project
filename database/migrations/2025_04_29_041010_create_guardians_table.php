<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('guardians', function (Blueprint $table) {
            $table->id();
            $table->foreignId('application_id')
                  ->constrained('applications')
                  ->onDelete('cascade');
            $table->enum('relation', ['father', 'mother', 'guardian']);
            $table->string('given_name');
            $table->string('middle_name')->nullable();
            $table->string('family_name');
            $table->string('occupation')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('guardians');
    }
};
