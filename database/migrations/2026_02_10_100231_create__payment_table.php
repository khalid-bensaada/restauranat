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
            
            $table->foreignId('reservation_id')
                ->constrained()
                ->cascadeOnDelete();
            
            $table->decimal('amount', 8, 2);
        
            $table->string('currency', 10)->default('MAD');
            
            $table->enum('payment_method', ['stripe', 'paypal']);
            
            $table->enum('status', [
                'pending',
                'paid',
                'failed',
                'refunded'
            ])->default('pending');
            
            $table->timestamp('paid_at')->nullable();

            $table->timestamps();

            $table->index(['reservation_id', 'status']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_payment');
    }
};
