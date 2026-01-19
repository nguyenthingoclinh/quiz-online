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
        Schema::create('exam_participants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('exam_id')->constrained();
            $table->foreignId('student_id')->constrained('users');
            $table->dateTime('start_time')->nullable();
            $table->dateTime('submit_time')->nullable();
            $table->float('total_score')->nullable();
            $table->enum('status', ['doing', 'submitted', 'graded'])->default('doing');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exam_participants');
    }
};
