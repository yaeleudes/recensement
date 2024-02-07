<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Succes</title>
</head>
<body class="container text-center">
    <img src="{{asset('assets/images/logo.jpg')}}" alt="Logo" height="128" width="128">
    <h1 class="text-uppercase fw-bold">Concorde nationale</h1>
    <div class="col flex-column align-items-center justify-content-center">
        <div class="alert alert-success mx-auto text-center">

            <p>Merci, vous avez été déjà enregistré(e) !</p>
        </div>
    </div>

    {{-- @if (session('deja_soumis'))
    <div class="row">
        <div class="col flex-column align-items-center justify-content-center">
            <div class="alert alert-success mx-auto text-center">
                <p>Vous avez déjà été enregistré!</p>
            </div>
        </div>
    </div>
    @endif --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>
</html>
