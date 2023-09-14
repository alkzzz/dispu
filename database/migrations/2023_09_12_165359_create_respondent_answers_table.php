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
        Schema::create('respondent_answers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('respondent_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('questionnaire_question_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('questionnaire_answer_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('respondent_answers');
    }
};
