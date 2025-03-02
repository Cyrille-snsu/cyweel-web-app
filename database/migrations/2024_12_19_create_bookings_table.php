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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('hotel');
            $table->string('room_type');
            $table->string('guest_name');
            $table->string('phone');
            $table->text('address');
            $table->datetime('check_in_date');
            $table->datetime('check_out_date');
            $table->integer('days_of_stay');
            $table->string('payment_method');
            $table->decimal('total_price', 10, 2);
            $table->text('special_requests')->nullable();
            $table->string('status')->default('confirmed');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
