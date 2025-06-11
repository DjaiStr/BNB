<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon_io/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon_io/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon_io/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('site.webmanifest') }}">
    <title>Kamers</title>
</head>
<style>
    .kamer-cards {
        display: flex;
        flex-direction: row;
    }

    .card-body {
        display: flex;
        flex-direction: column;
        justify-content: space-around;
    }

    .container-kamers {
        display: flex;
        justify-content: center;
        flex-direction: column;
        align-items: center;
    }

    .card {
        margin-top: 5vh;
    }
</style>

<body>
    <header>
        @include('partials.navbar')
    </header>
    <div class="container-kamers">
        @foreach ($roomTypes as $roomType)
        <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="{{  asset('../storage/app/public/' . $roomType->room_picture) }}" class="img-fluid rounded-start" alt="{{ $roomType->name }}">
                </div>
                <div class="col-md-8 kamer-cards">
                    <div class="card-body">
                        <h5 class="card-title">{{ $roomType->name }}</h5>
                        <p class="card-text">{{ $roomType->description }}</p>
                    </div>
                    <div class="card-body">
                        <h3 class="card-title">€{{ $roomType->base_price }}</h3>
                        <a href="{{ route('roomtypes.show', $roomType->id) }}" class="btn btn-info">Info</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</body>

</html>