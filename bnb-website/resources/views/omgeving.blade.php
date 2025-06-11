<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon_io/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon_io/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon_io/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('site.webmanifest') }}">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Italianno&display=swap" rel="stylesheet">
    <title>Omgeving</title>
    <style>
        .masonry {
            display: flex;
            flex-wrap: wrap;
            margin-left: -15px;
            margin-right: -15px;
        }

        .masonry-item {
            position: relative;
            flex: 1 0 21%;
            margin: 15px;
            background-color: #f8f9fa;
            border-radius: 8px;
            overflow: hidden;
            transition: transform 0.3s;
        }

        .masonry-item img {
            width: 100%;
            height: auto;
        }

        .masonry-item:hover {
            transform: scale(1.05);
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
            padding: 10px;
            text-align: center;
        }

        .masonry-item:hover .overlay {
            opacity: 1;
        }

        .overlay h3 {
            margin: 0;
            font-size: 1.5rem;
        }

        .overlay p {
            margin: 5px 0;
        }

        .overlay a {
            color: #ffffff;
            text-decoration: underline;
        }

        .italianno-regular {
            font-family: "Italianno", cursive;
            font-weight: 400;
            font-style: normal;
        }
    </style>
</head>

<body>
    <header>
        @include('partials.navbar')
    </header>
    <div class="container">
        <div class="text-center">
            <img src="{{ asset('img/achterhuyslogo.png') }}" alt="Logo" class="img-fluid mb-3" style="max-width: 200px;">
            <h1 class="text-center italianno-regular">Omgeving</h1>
        </div>
        <div class="masonry">
            @foreach ($activities as $activity)
            <div class="masonry-item">
                <img src="{{ $activity->image }}" alt="{{ $activity->name }}">
                <div class="overlay">
                    <h3>{{ $activity->name }}</h3>
                    <p>{{ $activity->description }}</p>
                    @if($activity->website)
                    <a href="{{ $activity->website }}" target="_blank">Visit Website</a>
                    @endif
                </div>
            </div>
            @endforeach
        </div>

    </div>
</body>

</html>