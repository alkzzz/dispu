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
        Schema::create('pupr_instagrams', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('username');
            $table->string('url');
            $table->longText('thumbnail');
            $table->longText('caption');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pupr_instagrams');
    }
};
