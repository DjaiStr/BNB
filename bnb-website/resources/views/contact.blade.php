<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon_io/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon_io/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon_io/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('site.webmanifest') }}">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Italianno&display=swap" rel="stylesheet">
    
  
    <title>Contact</title>
    <style>
        
        .masonry {
            display: flex;
            flex-wrap: wrap;
            margin-left: -15px;
            margin-right: -15px;
        }

        .masonry-item {
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
        <div class="text-center"><img src="{{ asset('img/achterhuyslogo.png') }}" alt="Logo" class="img-fluid mb-3" style="max-width: 200px;">
        <h1 class="text-center italianno-regular">Contact</h1>
        </div>
      
        <div class="col-md-6 float-end">
            <h2>Laat hier je gegevens achter.</h2>
            <form action="{{ route('contact.send') }}" method="POST">
                @csrf <!-- Laravel's beveiliging tegen cross-site request forgery (CSRF) aanvallen -->
                <div class="mb-3">
                    <input type="text" class="form-control" id="name" name="name" required placeholder="Naam" style="width: 100%;">
                </div>
                <div class="mb-3">
                    <input type="email" class="form-control" id="email" name="email" required placeholder="Email" style="width: 100%;">
                </div>
                <div class="mb-3">
                    <input type="tel" class="form-control" id="phone" name="phone" required placeholder="Telefoonnummer" style="width: 100%;">
                </div>
                <div class="mb-3">
                    <textarea class="form-control" id="remarks" name="message" rows="4" required placeholder="Opmerking" style="width: 100%;"></textarea>
                </div>
                <button type="submit"  class="btn btn-" style="background-color: rgba(66, 192, 251, 1)">Verzenden</button>
            </form>
        </div>
    
    
        


        <div class="row mb-2">
    <div class="col-12 col-md-6">
        <div class="form-control d-flex align-items-center p-2 rounded">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="rgba(66, 192, 251, 1)" class="bi bi-geo-alt-fill me-2" viewBox="0 0 16 16">
                <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6"/>
            </svg>
            <span class="mx-1 border-start" style="height: 12px;"></span>
            <a href="https://www.google.com/maps/place/Talland+College/@52.6396333,4.7433224,17z/data=!3m1!4b1!4m6!3m5!1s0x47cf57b01af926f9:0x8f33f2348d608ae0!8m2!3d52.6396333!4d4.7433224!16s%2Fg%2F1tctqy1p?entry=ttu&g_ep=EgoyMDI0MTAxNS4wIKXMDSoASAFQAw%3D%3D" 
               target="_blank" class="text-dark text-decoration-none fw-bold">
                Kruseman van Eltenweg 4 
            </a>
        </div>
    </div>
</div>

<div class="row mb-2">
    <div class="col-12 col-md-6">
        <div class="form-control d-flex align-items-center p-2 rounded">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="rgba(66, 192, 251, 1)" class="bi bi-telephone-fill me-2" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z"/>
            </svg>
            <span class="mx-1 border-start" style="height: 12px;"></span>
            <a href="tel:+31234456789" class="text-dark text-decoration-none fw-bold">
                +31 23 445 6789
            </a>
        </div>
    </div>
</div>

<div class="row mb-4">
    <div class="col-12 col-md-6">
        <div class="form-control d-flex align-items-center p-2 rounded">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="rgba(66, 192, 251, 1)" class="bi bi-envelope-at-fill me-2" viewBox="0 0 16 16">
                <path d="M2 2A2 2 0 0 0 .05 3.555L8 8.414l7.95-4.859A2 2 0 0 0 14 2zm-2 9.8V4.698l5.803 3.546zm6.761-2.97-6.57 4.026A2 2 0 0 0 2 14h6.256A4.5 4.5 0 0 1 8 12.5a4.49 4.49 0 0 1 1.606-3.446l-.367-.225L8 9.586zM16 9.671V4.697l-5.803 3.546.338.208A4.5 4.5 0 0 1 12.5 8c1.414 0 2.675.652 3.5 1.671"/>
                <path d="M15.834 12.244c0 1.168-.577 2.025-1.587 2.025-.503 0-1.002-.228-1.12-.648h-.043c-.118.416-.543.643-1.015.643-.77 0-1.259-.542-1.259-1.434v-.529c0-.844.481-1.4 1.26-1.4.585 0 .87.333.953.63h.03v-.568h.905v2.19c0 .272.18.42.411.42.315 0 .639-.415.639-1.39v-.118c0-1.277-.95-2.326-2.484-2.326h-.04c-1.582 0-2.64 1.067-2.64 2.724v.157c0 1.867 1.237 2.654 2.57 2.654h.045c.507 0 .935-.07 1.18-.18v.731c-.219.1-.643.175-1.237.175h-.044C10.438 16 9 14.82 9 12.646v-.214C9 10.36 10.421 9 12.485 9h.035c2.12 0 3.314 1.43 3.314 3.034zm-4.04.21v.227c0 .586.227.8.581.8.31 0 .564-.17.564-.743v-.367c0-.516-.275-.708-.572-.708-.346 0-.573.245-.573.791"/>
            </svg>
            <span class="mx-1 border-start" style="height: 12px;"></span>
            <a href="mailto:someone@example.com" class="text-dark text-decoration-none fw-bold">
            info@achterhuys.com
            </a>
        </div>
    </div>
</div>

<div style="max-width:100%; width:450px; height:300px;">
    <div id="my-map-display" style="height:100%; width:100%;">
        <iframe style="height:100%; width:100%; border:0;" frameborder="0" 
            src="https://www.google.com/maps/embed/v1/place?q=Kruseman+van+Eltenweg+4+1817+BC+Alkmaar&key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8">
        </iframe>
    </div>
</div>



</div>



</body>
</html>
