<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon_io/apple-touch-icon.png') }}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon_io/favicon-32x32.png') }}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon_io/favicon-16x16.png') }}">
  <link rel="manifest" href="{{ asset('site.webmanifest') }}">
  <link href="https://fonts.googleapis.com/css2?family=Italianno&display=swap" rel="stylesheet">
  <title>Home</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">

  <link href="https://cdn.js  delivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
  <header>
    @include('partials.navbar')
  </header>
  <div class="logincheck">
    @if(Auth::check())
    <!--  <h1>logged in</h1> -->
    @else
    <!--  <h1>not logged in</h1> -->
    @endif
  </div>
  <div class="container-fluid">
    <div id="carouselExampleCaptions" class="carousel slide pb-5">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="img/voorbeeld.jpg" class="d-block w-100 carousel-logo" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <img src="img/achterhuyslogo.png" width="100" class="carousel-brand"></img>
            <p>Some representative placeholder content for the first slide.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="img/voorbeeld2.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <img src="img/achterhuyslogo.png" width="100" class="carousel-brand"></img>
            <p>Some representative placeholder content for the second slide.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="img/afbeelding.avif" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <img src="img/achterhuyslogo.png" width="100" class="carousel-brand"></img>
            <p>Some representative placeholder content for the third slide.</p>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>

    <h1 class="text-center pt-5 pb-4 fw-bold">Het Achterhuys</h1>

  </div>
  <div class="container">
    <div class="row pb-5">
      <div class="col-md-6">
        <p class="fw-normal">
          Maecenas in tellus felis. Maecenas quis enim sagittis, condimentum tellus nec, vulputate purus. Cras luctus diam cursus velit posuere facilisis id
          ut enim. Duis ut elit nec dolor tristique cursus sed quis arcu. Nam porttitor mauris nibh, at convallis velit volutpat eget. Vivamus tincidunt neque vel
          tincidunt ultricies. In hac habitasse platea dictumst. Morbi id fringilla tellus, sed fermentum elit. Class aptent taciti
          sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Duis a ornare massa. Mauris venenatis
          pulvinar placerat. Quisque et sapien nec massa placerat blandit et a orci. Proin hendrerit malesuada elit,
          vitae lobortis ex dignissim sed. Quisque in nulla varius, tempus risus id, pellentesque dui.
        </p>
      </div>
      <div class="col-md-6">                    
        <p class="fw-normal">
          Maecenas in tellus felis. Maecenas quis enim sagittis, condimentum tellus nec, vulputate purus. Cras luctus diam cursus velit posuere facilisis id
          ut enim. Duis ut elit nec dolor tristique cursus sed quis arcu. Nam porttitor mauris nibh, at convallis velit volutpat eget. Vivamus tincidunt neque vel
          tincidunt ultricies. In hac habitasse platea dictumst. Morbi id fringilla tellus, sed fermentum elit. Class aptent taciti
          sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Duis a ornare massa. Mauris venenatis
          pulvinar placerat. Quisque et sapien nec massa placerat blandit et a orci. Proin hendrerit malesuada elit,
          vitae lobortis ex dignissim sed. Quisque in nulla varius, tempus risus id, pellentesque dui.
        </p>
      </div>
    </div>
    <div class="row text-center pt-4 pb-5">
      <div class="col-md-3 mx-auto">
        <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="rgba(66, 192, 251, 1)" class="bi bi-wifi" viewBox="0 0 16 16">
          <path d="M15.384 6.115a.485.485 0 0 0-.047-.736A12.44 12.44 0 0 0 8 3C5.259 3 2.723 3.882.663 5.379a.485.485 0 0 0-.048.736.52.52 0 0 0 .668.05A11.45 11.45 0 0 1 8 4c2.507 0 4.827.802 6.716 2.164.205.148.49.13.668-.049" />
          <path d="M13.229 8.271a.482.482 0 0 0-.063-.745A9.46 9.46 0 0 0 8 6c-1.905 0-3.68.56-5.166 1.526a.48.48 0 0 0-.063.745.525.525 0 0 0 .652.065A8.46 8.46 0 0 1 8 7a8.46 8.46 0 0 1 4.576 1.336c.206.132.48.108.653-.065m-2.183 2.183c.226-.226.185-.605-.1-.75A6.5 6.5 0 0 0 8 9c-1.06 0-2.062.254-2.946.704-.285.145-.326.524-.1.75l.015.015c.16.16.407.19.611.09A5.5 5.5 0 0 1 8 10c.868 0 1.69.201 2.42.56.203.1.45.07.61-.091zM9.06 12.44c.196-.196.198-.52-.04-.66A2 2 0 0 0 8 11.5a2 2 0 0 0-1.02.28c-.238.14-.236.464-.04.66l.706.706a.5.5 0 0 0 .707 0l.707-.707z" />
        </svg>
        <h4 class="fw-bold pt-4">Gratis Wifi</h4>
      </div>
      <div class="col-md-3 mx-auto">
        <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="rgba(66, 192, 251, 1)" class="bi bi-brightness-high" viewBox="0 0 16 16">
          <path d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6m0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8M8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0m0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13m8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5M3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8m10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0m-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0m9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707M4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708" />
        </svg>
        <h4 class="fw-bold pt-4">Landelijk gelegen</h4>
      </div>
      <div class="col-md-3 mx-auto">
        <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="rgba(66, 192, 251, 1)" class="bi bi-egg-fried" viewBox="0 0 16 16">
          <path d="M8 11a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
          <path d="M13.997 5.17a5 5 0 0 0-8.101-4.09A5 5 0 0 0 1.28 9.342a5 5 0 0 0 8.336 5.109 3.5 3.5 0 0 0 5.201-4.065 3.001 3.001 0 0 0-.822-5.216zm-1-.034a1 1 0 0 0 .668.977 2.001 2.001 0 0 1 .547 3.478 1 1 0 0 0-.341 1.113 2.5 2.5 0 0 1-3.715 2.905 1 1 0 0 0-1.262.152 4 4 0 0 1-6.67-4.087 1 1 0 0 0-.2-1 4 4 0 0 1 3.693-6.61 1 1 0 0 0 .8-.2 4 4 0 0 1 6.48 3.273z" />
        </svg>
        <h4 class="fw-bold pt-4">Uitgebreid ontbijt</h4>
      </div>
      <div class="col-md-3 mx-auto">
        <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="rgba(66, 192, 251, 1)" class="bi bi-p-square" viewBox="0 0 16 16">
          <path d="M5.5 4.002h2.962C10.045 4.002 11 5.104 11 6.586c0 1.494-.967 2.578-2.55 2.578H6.784V12H5.5zm2.77 4.072c.893 0 1.419-.545 1.419-1.488s-.526-1.482-1.42-1.482H6.778v2.97z" />
          <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm15 0a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1z" />
        </svg>
        <h4 class="fw-bold pt-4">Gratis parkeren</h4>
      </div>
    </div>
    <h1 class="pb-3">Reviewscore</h1>
    <div class="row">
      @foreach ($reviews as $review)
      <div class="col-md-3">
        <div class="card" style="width: 18rem;">
          <div class="card-body">
            <h5 class="card-title">{{ $review->name }}</h5>
            <h6 class="card-subtitle mb-2 text-body-secondary" style="color: gold;
        font-size: 1.5em;">@for ($i = 1; $i <= 5; $i++)
                @if ($i <=$review->rating)
                ★
                @else
                ☆
                @endif
                @endfor</h6>
            <p class="card-text">{{ $review->review }}</p>
            <p>{{ $review->created_at->format('Y-m-d H:i') }}</p>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>

  @include('partials.footer')

</body>

</html>