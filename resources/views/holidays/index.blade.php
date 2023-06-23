<!DOCTYPE html>
<html>
<head>
    <title>Holidays</title>
    <style>
        .holiday-box {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
<h1>Holidays</h1>

<form action="{{ route('holidays.index') }}" method="GET">
    <label for="country">Country:</label>
    <input type="text" name="country" id="country" value="{{ old('country', 'US') }}">
    <label for="year">Year:</label>
    <input type="number" name="year" id="year" value="{{ old('year', isset($year) ? $year : date('Y')) }}">
    <button type="submit">Search</button>
</form>

@if (isset($holidays) && $holidays['meta']['code'] == 200)
    <h2>{{ $holidays['response']['holidays'][0]['country']['name'] }} - {{ isset($year) ? $year : date('Y') }}</h2>
    @foreach ($holidays['response']['holidays'] as $holiday)
        <div class="holiday-box">
            <p>Date: {{ $holiday['date']['iso'] }}</p>
            <p>Name: {{ $holiday['name'] }}</p>
            <p>Type: {{ $holiday['type'][0] }}</p>
            <p>Description: {{ $holiday['description'] }}</p>
        </div>
    @endforeach
@else
    <p>Error retrieving holidays. Please try again.</p>
@endif
</body>
</html>
