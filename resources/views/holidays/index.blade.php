<!DOCTYPE html>
<html>
<head>
    <title>Holidays</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <style>
        .holiday-box {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
<h1>Holidays</h1>
<h2>Use a two-letter country code to specify the countries for which you want to retrieve holiday data. </h2>
<div class="container"></div>
<form action="{{ route('holidays.index') }}" method="GET" class="mb-4">
    <div class="row g-3 align-items-center">
        <div class="col-auto">
            <label for="country" class="col-form-label">Country:</label>
        </div>
        <div class="col-auto">
            <input type="text" name="country" id="country" value="{{ old('country', 'US') }}" class="form-control">
        </div>
        <div class="col-auto">
            <label for="year" class="col-form-label">Year:</label>
        </div>
        <div class="col-auto">
            <input type="number" name="year" id="year" value="{{ old('year', isset($year) ? $year : date('Y')) }}" class="form-control">
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </div>
</form>

@if (isset($holidays) && $holidays['meta']['code'] == 200)
    <h2>{{ $holidays['response']['holidays'][0]['country']['name'] }} - {{ isset($year) ? $year : date('Y') }}</h2>
    @foreach ($holidays['response']['holidays'] as $holiday)
        <div class="holiday-box bg-light p-3">
            <p><strong>Date:</strong> {{ $holiday['date']['iso'] }}</p>
            <p><strong>Name:</strong> {{ $holiday['name'] }}</p>
            <p><strong>Type:</strong> {{ $holiday['type'][0] }}</p>
            <p><strong>Description:</strong> {{ $holiday['description'] }}</p>
        </div>
    @endforeach
@else
    <div class="alert alert-danger">Error retrieving holidays. Please try again.</div>
    @endif
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
