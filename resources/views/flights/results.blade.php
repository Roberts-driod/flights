<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flight Booking System</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header>
        <h1>✈️ Flight Booking System</h1>
    </header>

    <main>
        <section class="search-section">
            <h2>Find Flights</h2>
            <form action="{{ route('flights.search') }}" method="GET">
                <div class="form-group">
                    <label for="from">From:</label>
                    <input type="text" name="from" value="{{ request('from') }}" required placeholder="Departure city">
                </div>

                <div class="form-group">
                    <label for="to">To:</label>
                    <input type="text" name="to" value="{{ request('to') }}" required placeholder="Destination city">
                </div>

                <div class="form-group">
                    <label for="departure">Departure Date:</label>
                    <input type="date" name="departure" value="{{ request('departure') }}" required>
                </div>

                <div class="form-group">
                    <label for="passengers">Passengers:</label>
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
            <div id="flight-results">
                @if(isset($flights))
                    @forelse($flights as $flight)
                        <div class="flight-card">
                            <div class="flight-info">
                                <div class="flight-route">
                                    <div class="route-city">{{ $flight->origin }}</div>
                                    <div class="route-arrow">→</div>
                                    <div class="route-city">{{ $flight->destination }}</div>
                                </div>
                                <div class="flight-details">
                                    <div class="detail-item">
                                        <span class="detail-label">DEPARTURE</span>
                                        <span class="detail-value">{{ $flight->flight_date }}</span>
                                    </div>
                                    <div class="detail-item">
                                        <span class="detail-label">AIRLINE</span>
                                        <span class="detail-value">{{ $flight->airplane->airline->name ?? 'N/A' }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="price">
                                ${{ $flight->price * (request('passengers') ?? 1) }}
                                <br>
                                <small>{{ request('passengers') ?? 1 }} x ${{ $flight->price }}</small>
                            </div>

                            <form action="{{ route('bookings.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="flight_id" value="{{ $flight->flight_id }}">
                                <input type="hidden" name="passenger_count" value="{{ request('passengers') ?? 1 }}">
                                <button type="submit" class="book-button">Book Now</button>
                            </form>
                        </div>
                    @empty
                        <p class="no-results">No flights found for your search criteria.</p>
                    @endforelse
                @else
                    <p class="no-results">Search for flights to get started.</p>
                @endif
            </div>
        </section>
    </main>
</body>
</html>