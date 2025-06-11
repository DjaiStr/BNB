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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

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

        .nav-btn {
            background-color: #f8f9fa;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            color: #6c757d;
        }

        .nav-btn.active {
            background-color: #007bff;
            color: white;
        }
    </style>
</head>

<body>
    <header>
        @include('partials.navbar')
    </header>

    <div class="container mt-4">
        <!-- Speciale Diensten -->
        <div class="custom-checkbox" data-target="massage" onclick="toggleCheckbox(this)">
            <div class="d-flex align-items-center">
                <input type="checkbox" id="massage">
                <label for="massage" class="mb-0 fw-bold">Massage</label>
            </div>
            <div class="price-container">
                <span class="price">€10,00</span>
                <a href="#" class="info-icon" data-bs-toggle="tooltip" title="Ontspan met een rustgevende massage.">?</a>
            </div>
        </div>

        <div class="custom-checkbox" data-target="sauna" onclick="toggleCheckbox(this)">
            <div class="d-flex align-items-center">
                <input type="checkbox" id="sauna">
                <label for="sauna" class="mb-0 fw-bold">Sauna</label>
            </div>
            <div class="price-container">
                <span class="price">€10,00</span>
                <a href="#" class="info-icon" data-bs-toggle="tooltip" title="Geniet van een ontspannen saunabeurt.">?</a>
            </div>
        </div>

        <div class="custom-checkbox" data-target="fietsverhuur" onclick="toggleCheckbox(this)">
            <div class="d-flex align-items-center">
                <input type="checkbox" id="fietsverhuur">
                <label for="fietsverhuur" class="mb-0 fw-bold">Fietsverhuur</label>
            </div>
            <div class="price-container">
                <span class="price">€10,00</span>
                <a href="#" class="info-icon" data-bs-toggle="tooltip" title="Huur een fiets voor een avontuurlijke rit.">?</a>
            </div>
        </div>

        <div class="custom-checkbox" data-target="cabriolet-huurauto" onclick="toggleCheckbox(this)">
            <div class="d-flex align-items-center">
                <input type="checkbox" id="cabriolet-huurauto">
                <label for="cabriolet-huurauto" class="mb-0 fw-bold">Cabriolet huurauto</label>
            </div>
            <div class="price-container">
                <span class="price">€10,00</span>
                <a href="#" class="info-icon" data-bs-toggle="tooltip" title="Rijd stijlvol in een cabriolet.">?</a>
            </div>
        </div>

        <div class="custom-checkbox" data-target="ontbijt-op-bed" onclick="toggleCheckbox(this)">
            <div class="d-flex align-items-center">
                <input type="checkbox" id="ontbijt-op-bed">
                <label for="ontbijt-op-bed" class="mb-0 fw-bold">Ontbijt op bed</label>
            </div>
            <div class="price-container">
                <span class="price">€10,00</span>
                <a href="#" class="info-icon" data-bs-toggle="tooltip" title="Geniet van heerlijk ontbijt op bed.">?</a>
            </div>
        </div>
    </div>

    <!-- Formulier sectie -->
    <div class="container pt-3">
        <h1>Book {{ $roomType->name }}</h1>
        <form action="{{ route('process.booking', $roomType->id) }}" method="POST">
            @csrf
            <input type="hidden" name="room_type_id" value="{{ $roomType->id }}">

            <div class="container mt-5">
                <div class="d-flex justify-content-between bg-light p-2 rounded">
                    <button class="nav-btn" onclick="showGuestForm()">Ga door als gast</button>
                    <button class="nav-btn" onclick="showAccountForm()">Maak account aan</button>
                    <button class="nav-btn active" onclick="showLoginForm()">Login</button>
                </div>

                <!-- Gast en Account formulier -->
                <div id="mainForm" class="mt-4">
                    <div class="row">
                        <div class="col-md-6">
                        <input type="text" name="name" id="name" class="form-control" placeholder="Naam" value="{{ old('name') }}" required>
                        </div>
                        <div class="col-md-6">
                        <input type="text" name="name" id="name" class="form-control" placeholder="Achternaam" value="{{ old('name') }}" required>
                        </div>
                    </div>
                    <div class="row mt-3">
    <div class="col-md-6">
        <input type="email" name="email" id="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required>
    </div>
    <div class="col-md-6">
        <input type="text" class="form-control" name="adres" id="adres" placeholder="Adres">
    </div>
</div>
<div class="row mt-3">
    <div class="col-md-6">
        <div class="input-group">
            <span class="input-group-text">
                <img src="https://upload.wikimedia.org/wikipedia/commons/2/20/Flag_of_the_Netherlands.svg" alt="NL" width="20"> +31
            </span>
            <input type="text" name="phone" class="form-control" placeholder="Telefoonnummer" id="phone" required>
        </div>
    </div>
    <div class="col-md-6 d-none" id="passwordField">
        <input type="password" class="form-control" name="password" placeholder="Wachtwoord">
    </div>
</div>

                    <div class="row mt-3">
                        <div class="col-md-6 d-none" id="passwordField">
                            <input type="password" class="form-control" placeholder="Wachtwoord">
                        </div>
                        <div class="col-md-6 d-none" id="phoneField">
                            <div class="input-group">
                                <span class="input-group-text">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/2/20/Flag_of_the_Netherlands.svg" alt="NL" width="20"> +31
                                </span>
                                <input type="text" class="form-control" placeholder="Telefoon nummer">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Login formulier -->
                <div id="loginForm" class="mt-4 d-none">
                    <div class="row">
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="Gebruikersnaam of Email">
                        </div>
                        <div class="col-md-6">
                            <input type="password" class="form-control" placeholder="Wachtwoord">
                        </div>
                    </div>
                    <button class="btn btn-primary mt-3">Log in</button>
                </div>

                <div class="mt-4">
                    <p>Laat ons weten of er nog speciale wensen zijn</p>
                    <textarea class="form-control" rows="4" placeholder="Type hier..."></textarea>
                </div>
            </div>

            <div class="mb-3">
                @csrf
                <label for="start_date">Start Date</label>
                <input type="date" name="start_date" id="start_date" value="{{ $startDate ?? '' }}" required>

                <label for="end_date">End Date</label>
                <input type="date" name="end_date" id="end_date" value="{{ $endDate ?? '' }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Afrekenen</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Functie voor het instellen van de actieve knop
        document.addEventListener('DOMContentLoaded', function () {
            const navButtons = document.querySelectorAll('.nav-btn');
            
            navButtons.forEach(btn => {
                btn.addEventListener('click', function (e) {
                    e.preventDefault(); // voorkom dat de knop zichzelf opnieuw laadt
                    const formType = this.textContent.trim().toLowerCase(); // haal de tekst van de knop

                    // Verberg alle formulieren en toon de juiste
                    toggleForms(formType);

                    // Zet de actieve stijl op de geklikte knop
                    setActiveButton(this);
                });
            });

            // Functie voor het tonen van de juiste formulieren
            function toggleForms(formType) {
                const mainForm = document.getElementById('mainForm');
                const loginForm = document.getElementById('loginForm');

                if (formType === 'ga door als gast') {
                    mainForm.classList.remove('d-none');
                    loginForm.classList.add('d-none');
                    document.getElementById('passwordField').classList.add('d-none');
                    document.getElementById('phoneField').classList.add('d-none');
                } else if (formType === 'maak account aan') {
                    mainForm.classList.remove('d-none');
                    loginForm.classList.add('d-none');
                    document.getElementById('passwordField').classList.remove('d-none');
                    document.getElementById('phoneField').classList.remove('d-none');
                } else if (formType === 'login') {
                    mainForm.classList.add('d-none');
                    loginForm.classList.remove('d-none');
                }
            }

            // Functie voor het instellen van de actieve knop
            function setActiveButton(clickedButton) {
                // Verwijder de actieve klasse van alle knoppen
                navButtons.forEach(button => button.classList.remove('active'));

                // Voeg de actieve klasse toe aan de geklikte knop
                clickedButton.classList.add('active');
            }

            // Checkbox logica
            const checkboxes = document.querySelectorAll('.custom-checkbox input[type="checkbox"]');
            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function () {
                    const parent = this.closest('.custom-checkbox');
                    if (this.checked) {
                        parent.classList.add('active');
                    } else {
                        parent.classList.remove('active');
                    }
                });
            });
        });

        // Functie om de checkbox te toggelen wanneer op de balk wordt geklikt
        function toggleCheckbox(element) {
            const checkbox = element.querySelector('input[type="checkbox"]');
            checkbox.checked = !checkbox.checked;
            checkbox.dispatchEvent(new Event('change'));
        }
    </script>
</body>

</html>
