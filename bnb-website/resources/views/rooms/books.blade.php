<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon_io/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon_io/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon_io/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('site.webmanifest') }}">
    <title>Book {{ $roomType->name }}</title>
    <link rel="stylesheet" href="../style.css"> <!-- Link your stylesheets if needed -->



    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

</body>
<header>
    @include('partials.navbar')
</header>
<style>
    .custom-checkbox {
      display: flex;
      align-items: center;
      justify-content: space-between;
      border: 1px solid #dee2e6;
      border-radius: 5px;
      padding: 10px 15px;
      background-color: #f8f9fa;
      cursor: pointer;
      transition: background-color 0.3s;
      margin-bottom: 10px;
      max-width: 50%;
    }
    .custom-checkbox:hover {
      background-color: #e9ecef;
    }
    .custom-checkbox.active {
      background-color: #d4edda;
      border-color: #28a745;
    }
    .custom-checkbox input[type="checkbox"] {
      appearance: none;
      width: 16px;
      height: 16px;
      border: 2px solid #0d6efd;
      border-radius: 50%;
      display: inline-block;
      margin-right: 10px;
      position: relative;
    }
    .custom-checkbox input[type="checkbox"]:checked::before {
      content: '';
      display: block;
      width: 8px;
      height: 8px;
      background-color: #0d6efd;
      border-radius: 50%;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
    }
    .price {
      font-weight: bold;
      text-align: left; 
      width: 100%;
      margin-left: -10px; 
    }
    .info-icon {
      font-size: 16px;
      color: #6c757d;
      text-decoration: none;
      margin-left: 10px;
      cursor: pointer;
    }
    .price-container {
      display: flex;
      justify-content: flex-start;
      align-items: center;
    }
  </style>
</head>
<body>
  <div class="container mt-4">
    <!-- Massage -->
    <div class="custom-checkbox" data-target="massage">
      <div class="d-flex align-items-center">
        <input type="checkbox" id="massage" name="" value="Massage">
        <label for="massage" class="mb-0 fw-bold">Massage</label>
      </div>
      <div class="price-container">
        <span class="price">€10,00</span>
        <a href="#" class="info-icon" data-bs-toggle="tooltip" title="Ontspan met een rustgevende massage.">?</a>
      </div>
    </div>

    <!-- Sauna -->
    <div class="custom-checkbox" data-target="sauna">
      <div class="d-flex align-items-center">
        <input type="checkbox" name="" id="sauna" value="Sauna">
        <label for="sauna" class="mb-0 fw-bold">Sauna</label>
      </div>
      <div class="price-container">
        <span class="price">€10,00</span>
         <a href="#" class="info-icon" data-bs-toggle="tooltip" title="Geniet van een ontspannen saunabeurt.">?</a>
      </div>
    </div>

    <!-- Fietsverhuur -->
    <div class="custom-checkbox" data-target="fietsverhuur">
      <div class="d-flex align-items-center">
        <input type="checkbox" id="fietsverhuur" name="" value="Fietsverhuur">
        <label for="fietsverhuur" class="mb-0 fw-bold">Fietsverhuur</label>
      </div>
      <div class="price-container">
        <span class="price">€10,00</span>
        <a href="#" class="info-icon" data-bs-toggle="tooltip" title="Huur een fiets voor een avontuurlijke rit.">?</a>
      </div>
    </div>

    <!-- Cabriolet Huurauto -->
    <div class="custom-checkbox" data-target="cabriolet-huurauto">
      <div class="d-flex align-items-center">
        <input type="checkbox" id="cabriolet-huurauto" name="" value="Cabriolet huurauto">
        <label for="cabriolet-huurauto" class="mb-0 fw-bold">Cabriolet huurauto</label>
      </div>
      <div class="price-container">
        <span class="price">€10,00</span>
        <a href="#" class="info-icon" data-bs-toggle="tooltip" title="Rijd stijlvol in een cabriolet.">?</a>
      </div>
    </div>

    <!-- Ontbijt op bed -->
    <div class="custom-checkbox" data-target="ontbijt-op-bed">
      <div class="d-flex align-items-center">
        <input type="checkbox" id="ontbijt-op-bed" name="" value="Ontbijt op bed">
        <label for="ontbijt-op-bed" class="mb-0 fw-bold">Ontbijt op bed</label>
      </div>
      <div class="price-container">
        <span class="price">€10,00</span>
        <a href="#" class="info-icon" data-bs-toggle="tooltip" title="Geniet van heerlijk ontbijt op bed.">?</a>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Tooltip initialisatie
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
    tooltipTriggerList.forEach(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));

    // Maak de hele bar aanklikbaar voor de checkboxen
    document.querySelectorAll('.custom-checkbox').forEach((bar) => {
      bar.addEventListener('click', function () {
        const checkboxInput = this.querySelector('input[type="checkbox"]');

        // Toggle de checkbox aan of uit
        checkboxInput.checked = !checkboxInput.checked;

        // Toggle de actieve stijl
        if (checkboxInput.checked) {
          this.classList.add('active');
        } else {
          this.classList.remove('active');
        }
      });
    });
  </script>

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
<div class="container pt-3">
    <h1>Book {{ $roomType->name }}</h1>

    <form action="{{ route('process.booking', $roomType->id) }}" method="POST">
    @csrf
    
    <input type="hidden" name="room_type_id" value="{{ $roomType->id }}">
    
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
        </div>
        
        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone') }}" required>
        </div>

        <div class="mb-3">
            @csrf

            <label for="start_date">Start Date</label>
            <input type="" name="start_date" id="start_date" value="{{ $startDate ?? '' }}" required>

            <label for="end_date">End Date</label>
            <input type="" name="end_date" id="end_date" value="{{ $endDate ?? '' }}" required>
        </div>     

        <button type="submit" class="btn btn-primary">Afrekenen</button>
    </form>
</div>
</body>