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
            $table->foreignId('airplane_id')
                ->constrained('airplanes')
                ->cascadeOnDelete();

            $table->date('flight_date');
            $table->date('return_date');
            $table->string('departure_city', 45)->nullable();
            $table->string('arrival_city', 45)->nullable();
            $table->decimal('price', 10, 2)->unsigned();
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
