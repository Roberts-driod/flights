<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
        public function up()
        {
            Schema::create('flights', function (Blueprint $table) {
                $table->id('flight_id'); // Pārliecinies, ka nosaukums sakrīt ar DB
                $table->foreignId('airplane_id');
                $table->date('flight_date');
                $table->date('return_date');
                $table->string('origin');        // Mainām 'from' -> 'origin'
                $table->string('destination');   // Mainām 'to' -> 'destination'
                $table->decimal('price', 10, 2);
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
