


@foreach($flights as $flight)
    <div>
        {{ $flight->from }} → {{ $flight->to }}
        {{ $flight->flight_date }}
        {{ $flight->airplane->airline->name }}
        €{{ $flight->price }}

        <form action="/book" method="POST">
            @csrf
            <input type="hidden" name="flight_id" value="{{ $flight->flight_id }}">
            <input type="number" name="passengers" value="1" min="1">
            <button>Book</button>
        </form>
    </div>
@endforeach
