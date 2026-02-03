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
        Schema::create('restaurants' , function (Blueprint $table) {
            $table->id();
            $table->string('name_restaurant');
            $table->string('city');
            $table->string('image_resto');
            $table->integer('capacity');
            $table->boolean('actif');
            $table->string('oppen_hours');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
