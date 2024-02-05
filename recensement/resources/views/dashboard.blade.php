<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Admin | Dashboard</title>
</head>
<body>
    <div class="container">
        <header class="text-center">
            <img src="{{asset('assets/images/download.png')}}" alt="Logo" height="128" width="128">
            <h1 class="text-uppercase fw-bold">Concorde national</h1>
            <p>Tableau de bord</p>
        </header>
    </div>

    <section class="pt-4 row d-flex justify-content-center">
        <div class="col flex-column align-items-center justify-content-center">
            <div class="row d-flex justify-content-center ">
                <div class="col-6 col-sm-8  p-3 mb-3 bg-success rounded text-center">
                    <p class=" m-0 text-white fw-bold">Inscrits : {{ $nbrInscrit }}</p>
                </div>
            </div>

            <div class="col d-flex">
                <div class="col d-flex justify-content-center">
                    <a href="{{route('admin.export-data')}}" class="btn btn-success">Exporter</a>
                </div>
                <div class="col d-flex justify-content-center">
                    <a href="{{route('admin.logout')}}" class="btn btn-danger">Déconnexion</a>
                </div>
            </div>

        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous">
    </script>
</body>
</html>
