<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Navbar</title>
  <link rel="stylesheet" href="{{ asset('style.css') }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<style>
  .dropdownnav {
    background: none;
    /* Remove background */
    border: none;
    /* Remove border */
    padding: 10px;
    /* Add padding for touch targets */
    font: inherit;
    /* Inherit font styles */
    color: inherit;
    /* Inherit text color */
    cursor: pointer;
    /* Change cursor to pointer */
    text-decoration: none;
    /* Remove underline from links */
    display: block;
    /* Make links block level for better click area */
  }

  .hover-underline-animation {
    display: inline-block;
    position: relative;
  }

  .hover-underline-animation:after {
    content: '';
    position: absolute;
    width: 100%;
    transform: scaleX(0);
    height: 2px;
    bottom: 0;
    left: 0;
    background-color: rgba(66, 192, 251, 1);
    transform-origin: bottom right;
    transition: transform 0.25s ease-out;
  }

  .hover-underline-animation:hover:after {
    transform: scaleX(1);
    transform-origin: bottom left;
  }
</style>

<body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      <a class="navbar-brand" href="{{ route('index') }}"><img src="{{ asset('img/achterhuyslogo.png') }}" width="100" /></a>

        <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link fw-bold hover-underline-animation" aria-current="page" href="{{ route('index') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-bold hover-underline-animation" aria-disabled="true" href="{{ route('kamers.index') }}">Kamers</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-bold hover-underline-animation" aria-disabled="true" href="{{ route('omgeving') }}">Omgeving</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-bold hover-underline-animation" aria-disabled="true" href="{{ route('contact') }}">Contact</a>
          </li>
          <li class="nav-item d-flex align-items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="rgba(66, 192, 251, 1)" class="bi bi-calendar-week ms-2" viewBox="0 0 16 16">
              <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm-3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm-5 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5z" />
              <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z" />
            </svg>
            <a class="nav-link fw-bold hover-underline-animation" href="#">Boek nu</a>
          </li>
        </ul>
        <div class="dropdown">
          <a class="dropdown-toggle text-rgba(66, 192, 251, 1)" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="rgba(66, 192, 251, 1)" class="bi bi-person-circle" viewBox="0 0 16 16">
              <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
              <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
            </svg>
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            @if(Auth::check())
            <li>
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="dropdownnav" type="submit">Logout</button>
              </form>
            </li>
            <li>
              <a class="dropdownnav" href="{{ route('profile.edit') }}">Profiel</a>
            </li>
            @else
            <li>
              <a class="dropdownnav" href="{{ route('login') }}">Login</a>
            </li>
            <li>
              <a class="dropdownnav" href="{{ route('register') }}">Register</a>
            </li>
            @endif
          </ul>
        </div>
      </div>
    </div>
  </nav>
</body>

</html>