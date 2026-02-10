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
        Schema::create('reservations', function (Blueprint $table) {

            $table->id();

            $table->date('reservation_day');

            $table->time('reservation_time');

            $table->integer('prsn_number');

            $table->enum('status', ['pending', 'confirmed', 'cancelled'])
                ->default('pending');

            $table->timestamp('expires_at')->nullable();

            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('restaurant_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->timestamps();

            $table->index(['restaurant_id', 'reservation_day', 'reservation_time']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservation');
    }
};
