<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon_io/apple-touch-icon.png') }}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon_io/favicon-32x32.png') }}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon_io/favicon-16x16.png') }}">
  <link rel="manifest" href="{{ asset('site.webmanifest') }}">
  <link rel="stylesheet" href="../style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
   <!-- Include Flatpickr CSS -->
   <link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" rel="stylesheet">

  <style>
    .carousel-item img {
      width: 100%;
      height: 400px;
      object-fit: cover;
    }

    .thumbnail-images img {
      cursor: pointer;
      width: 100px;
      height: 70px;
      object-fit: cover;
      margin-right: 10px;
      opacity: 0.6;
    }

    .thumbnail-images img.active {
      border: 2px solid #007bff;
      opacity: 1;
    }

    #calendar-container {
      display: flex;
      flex-direction: row;
      margin-top: 20px;
    }

    .flatpickr-calendar {
      width: 250px !important;
      margin: 2vh;
    }

    #book-now {
      margin-bottom: 2vh;
    }
  </style>
  <title>{{ $roomType->title }}</title>
</head>

<body>
  <header>
    @include('partials.navbar')
  </header>

  <div class="room-details container mt-5">
    <h1>{{ $roomType->title }}</h1>

    <!-- Carousel -->
    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="{{  asset('../storage/app/public/' . $roomType->room_picture) }}" class="d-block w-100" alt="Room Image 1">
        </div>
        @if (!empty($roomType->additional_pictures) && is_array($roomType->additional_pictures))
        @foreach ($roomType->additional_pictures as $picture)
        <div class="carousel-item">
          <img src="{{ $picture }}" class="d-block w-100" alt="Room Image {{ $loop->iteration + 1 }}">
        </div>
        @endforeach
        @endif
      </div>

      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>

    <div class="container my-4">
      <div class="row">
        <!-- Massage -->
        <div class="col-md-6 d-flex align-items-center mb-3">
          <img src="{{ asset('icons/facial.png') }}" alt="Massage Icon" class="img-fluid me-3" style="width: 50px; height: 50px;">
          <span>Massage</span>
        </div>

        <!-- Spa -->
        <div class="col-md-6 d-flex align-items-center mb-3">
          <img src="{{ asset('icons/spa.png') }}" alt="Spa Icon" class="img-fluid me-3" style="width: 50px; height: 50px;">
          <span>Spa</span>
        </div>

        <!-- Fiets Verhuur -->
        <div class="col-md-6 d-flex align-items-center mb-3">
          <img src="{{ asset('icons/fiets.png') }}" alt="Fiets Verhuur Icon" class="img-fluid me-3" style="width: 50px; height: 50px;">
          <span>Fiets Verhuur</span>
        </div>

        <!-- Cabriolet Huren -->
        <div class="col-md-6 d-flex align-items-center mb-3">
          <img src="{{ asset('icons/cabrio.png') }}" alt="Cabriolet Huren Icon" class="img-fluid me-3" style="width: 50px; height: 50px;">
          <span>Cabriolet Huren</span>
        </div>

        <!-- Ontbijt Op Bed -->
        <div class="col-md-6 d-flex align-items-center mb-3">
          <img src="{{ asset('icons/ontbijt.png') }}" alt="Ontbijt Op Bed Icon" class="img-fluid me-3" style="width: 50px; height: 50px;">
          <span>Ontbijt Op Bed</span>
        </div>
      </div>
    </div>

    <h1>{{ $roomType->name }}</h1>
    <p>{{ $roomType->description }}</p>
    <p>Price: €{{ $roomType->base_price }}</p>

    <!-- Calendar Form -->
    <div id="calendar-container">
      <div id="start_calendar" class="flatpickr-calendar"></div>
      <div id="end_calendar" class="flatpickr-calendar"></div>
    </div>

    <button type="button" id="book-now" class="btn btn-primary">Check Availability & Book Now</button>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
  <script>
    // Initialize Flatpickr for both calendars
    const startCalendar = flatpickr("#start_calendar", {
      inline: true,
      dateFormat: "Y-m-d",
      altInput: true,
      altFormat: "Y-m-d",
    });

    const endCalendar = flatpickr("#end_calendar", {
      inline: true,
      dateFormat: "Y-m-d",
      altInput: true,
      altFormat: "Y-m-d",
    });

    // Function to manually format the date
    function formatDateToUTC(date) {
      return date.toLocaleDateString('en-CA');
    }

    // Capture the selected dates when the book now button is clicked
    document.getElementById('book-now').addEventListener('click', function() {
      const startDate = startCalendar.selectedDates[0];
      const endDate = endCalendar.selectedDates[0];

      if (startDate && endDate) {
        const roomId = "{{ $roomType->id }}";

        // Manually format the selected dates
        const formattedStartDate = formatDateToUTC(startDate);
        const formattedEndDate = formatDateToUTC(endDate);

        // Redirect to the booking page with formatted dates
        const bookingUrl = `{{ route('book.roomtype', ':id') }}?start_date=${formattedStartDate}&end_date=${formattedEndDate}`.replace(':id', roomId);
        window.location.href = bookingUrl;
      } else {
        alert('Please select both start and end dates.');
      }
    });
  </script>

  <!-- Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <script>
    // Active thumbnail logic
    const thumbnails = document.querySelectorAll('.thumbnail-images img');
    const carousel = document.querySelector('#carouselExample');

    thumbnails.forEach((thumbnail, index) => {
      thumbnail.addEventListener('click', function() {
        thumbnails.forEach(tn => tn.classList.remove('active'));
        this.classList.add('active');
      });

      carousel.addEventListener('slide.bs.carousel', function(event) {
        thumbnails.forEach(tn => tn.classList.remove('active'));
        thumbnails[event.to].classList.add('active');
      });
    });
  </script>
</body>

</html>