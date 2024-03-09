<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="icon" href="{{ asset('assets/images/logo.ico') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('assets/images/logo.ico') }}" type="image/x-icon">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type='text/javascript' src='https://www.gstatic.com/charts/loader.js'></script>
    <title>Admin | Dashboard</title>

    {{-- Graph Circulaire 1--}}
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Zone de vote', 'Nombre'],
          ['Abidjan',     {{$users->where('zone_rattachement', '=', 'Abidjan')->count()}}],
          ['Intérieur du pays',      {{$users->where('zone_rattachement', '=', 'Intérieur Du Pays')->count()}}],
          ['Hors du pays',  {{$users->where('zone_rattachement', '=', 'Hors Du Pays')->count()}}],
        ]);

        var options = {
            title: 'none',
            // pieHole: 0.6,
            is3D: true,
            legend: {
                alignement: 'center',
                position: 'top',
                bold: true,
                texteStyle: {
                    bold: true
                }
            },
            backgroundColor: 'none',
            width: 500,
            height: 500,
            chartArea: {
                    left: 5, // Centre horizontalement le graphique
                    top: 60 // Centre verticalement le graphique
                },
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d_1'));

        chart.draw(data, options);
      }
    </script>

    {{-- Graph Circulaire 2--}}
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Zone de vote', 'Nombre'],
          ['Militant du PDCI-RDA',     {{$users->where('pdci_rda', '=', 'Oui')->count()}}],
          ['Non Militant',      {{$users->where('pdci_rda', '=', 'Non')->count()}}]
        ]);

        var options = {
            title: '2',
            // pieHole: 0.6,
            is3D: true,
            legend: {
                alignement: 'center',
                position: 'top',
                bold: true,
                texteStyle: {
                    bold: true
                }
            },
            backgroundColor: 'none',
            width: 500,
            height: 500,
            chartArea: {
                    left: 5, // Centre horizontalement le graphique
                    top: 60 // Centre verticalement le graphique
                },
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d_2'));

        chart.draw(data, options);
      }
    </script>

    <script type="text/javascript">
        google.charts.load("current", {packages:["corechart"]});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Dinosaur', 'Length'],
                ['Acrocanthosaurus (top-spined lizard)', 12.2],
                ['Albertosaurus (Alberta lizard)', 9.1],
                ['Allosaurus (other lizard)', 12.2],
                ['Apatosaurus (deceptive lizard)', 22.9],
                ['Archaeopteryx (ancient wing)', 0.9],
                ['Argentinosaurus (Argentina lizard)', 36.6],
                ['Baryonyx (heavy claws)', 9.1],
                ['Brachiosaurus (arm lizard)', 30.5],
                ['Ceratosaurus (horned lizard)', 6.1],
                ['Coelophysis (hollow form)', 2.7],
                ['Compsognathus (elegant jaw)', 0.9],
                ['Deinonychus (terrible claw)', 2.7],
                ['Diplodocus (double beam)', 27.1],
                ['Dromicelomimus (emu mimic)', 3.4],
                ['Gallimimus (fowl mimic)', 5.5],
                ['Mamenchisaurus (Mamenchi lizard)', 21.0],]);

            var options = {
                title: 'Lengths of dinosaurs, in meters',
                legend: { position: 'center' },
            };

            var chart = new google.visualization.Histogram(document.getElementById('chart_div'));
            chart.draw(data, options);
        }
    </script>

</head>
<body class="container-fluid m-0 px-2 py-2" style="background-color: #E8F5E9">
    <div class="row vh-100 justify-content-between sidebare">
        {{-- Side bare --}}
        <div class="col-2 bg-white shadow-lg rounded-4 p-2 d-flex flex-column justify-content-between align-items-center">
            <div class="">
                <div class="text-center mb-4">
                    <img src="{{ asset('assets/images/logo.jpg') }}" alt="Logo" height="128" width="128">
                    <p class="text-uppercase fw-bold m-0 fs-4">Concorde nationale</p>
                </div>

                <hr class="bg-success">
                <ul class="list-unstyled mt-1 pb-0">
                    <li class="mb-2 px-3 fw-bold fs-5"><a href="{{route('admin.dashboard')}}" class="text-decoration-none px-3 py-2 d-block text-success"><i class="bi bi-house-fill"></i> Accueil</a></li>
                    <li class="mb-2 px-3 fw-bold fs-5"><a href="{{route('admin.dashboard')}}" class="text-decoration-none px-3 py-2 d-block text-success"><i class="bi bi-people-fill"></i> Inscrits</a></li>
                    <li class="mb-2 px-3 fw-bold fs-5"><a href="{{route('admin.archivage')}}" class="text-decoration-none px-3 py-2 d-block text-success"><i class="bi bi-box-arrow-down"> </i> Archivage</a></li>
                    <li class="mb-2 px-3 fw-bold fs-5"><a href="{{route('admin.stats')}}" class="text-decoration-none px-3 py-2 d-block text-success"><i class="bi bi-graph-up"></i> Statistiques</a></li>
                    {{-- <li class="mb-2 px-3 fw-bold fs-5"><a href="" class="text-decoration-none px-3 py-2 d-block text-success"><i class="bi bi-file-earmark-arrow-down-fill"></i> Ajouter un admin</a></li> --}}
                </ul>
                {{-- <hr class="bg-success"> --}}
                <div class="accordion accordion-flush ps-3">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingOne">
                          <button class="accordion-button collapsed text-success fw-bold fs-5 py-0 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            Axes
                          </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                          <div class="accordion-body px-0">
                            <ul class="list-unstyled">
                                <li class="mb-2 px-3 fw-bold fs-5"><a class="text-decoration-none px-3 py-2 d-block text-success" href="{{route('super.axeListe')}}"><i class="bi bi-list-ul"></i> Liste des axes</a></li>
                                <li class="mb-2 px-3 fw-bold fs-5"><a class="text-decoration-none px-3 py-2 d-block text-success" href="{{route('super.adminList')}}"><i class="bi bi-person-badge-fill"></i> Admins des axes</a></li>
                                <li class="mb-2 px-3 fw-bold fs-5"><a class="text-decoration-none px-3 py-2 d-block text-success" href="{{route('super.add')}}"><i class="bi bi-person-fill-add"></i> Ajouter admin</a></li>
                                <li class="mb-2 px-3 fw-bold fs-5"></li>
                            </ul>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
            <ul class="list-unstyled">
                <li><a href="{{route('admin.logout')}}" class="btn btn-danger px-4 fs-5"><i class="bi bi-box-arrow-left fw-bold"> </i> Déconnexion</a></li>
            </ul>
        </div>

        {{-- Zone de contenu --}}
        <div class="col-10">
            <div class="flex-column vh-10 ">
                <div class="d-flex bg-white shadow-lg rounded-4 justify-content-between p-3 mb-4">
                    <div class="col-5 d-flex">
                        <h1>Page d'accueil</h1>
                    </div>
                    <div class="col-7 d-flex justify-content-end">
                        <form class="col-5 d-flex me-3">
                            @csrf
                            <input class="form-control me-2" type="search" name="recherche" placeholder="Rechercher dans la liste des inscrits" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Rechercher</button>
                        </form>
                        <div class="col-3 d-flex justify-content-evenly align-items-center rounded-2 border border-success">
                            <div class="col-8 dropdown">
                                <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                    yael ahodan
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <li><a class="dropdown-item" href="#">Mes informations</a></li>
                                    <li><a class="dropdown-item" href="#">Deconnexion</a></li>
                                    {{-- <li><a class="dropdown-item" href="#">Something else here</a></li> --}}
                                </ul>
                            </div>
                            <img src="..." class="rounded-circle" alt="...">
                        </div>
                    </div>
                </div>
                <div class="rounded-3 shadow-lg py-3 px-1 bg-white" style="background-color: E8F5E9">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"> </script>
</body>
</html>
