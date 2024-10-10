<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('seats', function (Blueprint $table) {
            $table->id();
            $table->string('seatNumber');
            $table->string('type');
            $table->foreignId('hall_id')->constrained('halls')->onDelete('cascade');
            $table->timestamps();
        });
        
    }

    public function down(): void
    {
        Schema::dropIfExists('seats');
    }
};
