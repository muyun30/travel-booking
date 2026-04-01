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
    Schema::create('flights', function (Blueprint $table) {
        $table->id();
        $table->string('airline');
        $table->string('flight_number')->unique();
        $table->string('origin');
        $table->string('destination');
        $table->dateTime('departure_at');
        $table->dateTime('arrival_at');
        $table->decimal('price', 10, 2);
        $table->integer('seats_available');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flights');
    }
};
