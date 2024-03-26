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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('event_id'); // Assuming you have an events table
            $table->unsignedBigInteger('payment_id')->nullable();
            $table->string('ticket_number')->unique();
            $table->string('name')->nullable();
            $table->string('path')->nullable();
            $table->boolean('is_hard_copy')->default(0);
            $table->boolean('is_used')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
