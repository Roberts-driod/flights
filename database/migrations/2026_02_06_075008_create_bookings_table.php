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
            Schema::create('bookings', function (Blueprint $table) {
                $table->id('book_id'); // Tavs primārais ID

                // Svarīgais labojums:
                // Mēs pasakām: sasaisti 'flight_id' ar tabulas 'flights' kolonnu 'flight_id'
                $table->foreignId('flight_id')->constrained('flights', 'flight_id')->onDelete('cascade');

                $table->integer('passenger_count');
                $table->decimal('total_price', 10, 2);
                $table->dateTime('booking_date');
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
