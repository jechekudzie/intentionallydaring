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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('event_id');
            $table->string('currency');
            $table->decimal('total_amount', 10, 2);
            $table->integer('number_of_tickets');
            $table->string('payment_method');
            $table->string('status');
            $table->string('reference')->nullable();
            $table->string('pollUrl')->nullable();
            $table->string('paynowreference')->nullable();
            $table->string('payment_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
