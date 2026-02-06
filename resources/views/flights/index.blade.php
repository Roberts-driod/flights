<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flight Booking System</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header><h1>✈️ Flight Booking System</h1></header>
    <main>
        <section class="search-section">
            <h2>Find Flights</h2>
            <form action="{{ route('flights.search') }}" method="GET">
                <div class="form-group">
                    <label>From:</label>
                    <input type="text" name="from" required value="{{ request('from') }}">
                </div>
                <div class="form-group">
                    <label>To:</label>
                    <input type="text" name="to" required value="{{ request('to') }}">
                </div>
                <div class="form-group">
                    <label>Departure Date:</label>
                    <input type="date" name="departure" required value="{{ request('departure') }}">
                </div>
                <div class="form-group">
                    <label>Passengers:</label>
                    <select name="passengers">
                        @for ($i = 1; $i <= 5; $i++)
                            <option value="{{ $i }}" {{ request('passengers') == $i ? 'selected' : '' }}>{{ $i }}</option>
                        @endfor
                    </select>
                </div>
                <button type="submit">Search Flights</button>
            </form>
        </section>

        <section class="results-section">
            <h2>Available Flights</h2>
            @if(isset($flights))
                @forelse($flights as $flight)
                    <div class="flight-card">
                        <div class="flight-info">
                            <div class="flight-route">
                                <strong>{{ $flight->from }} → {{ $flight->to }}</strong>
                            </div>
                            <div class="flight-details">
                                <span>Airlines: {{ $flight->airplane->airline->name }}</span>
                                <span>Date: {{ $flight->flight_date }}</span>
                            </div>
                        </div>
                        <div class="price">
                            ${{ $flight->price * ($passengers ?? 1) }}
                            <small>{{ $passengers ?? 1 }} x ${{ $flight->price }}</small>
                        </div>

                        <form action="{{ route('bookings.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="flight_id" value="{{ $flight->flight_id }}">
                            <input type="hidden" name="passenger_count" value="{{ $passengers ?? 1 }}">
                            <button type="submit" class="book-button">Book Now</button>
                        </form>
                    </div>
                @empty
                    <p>No flights found.</p>
                @endforelse
            @endif
        </section>
    </main>
</body>
</html>