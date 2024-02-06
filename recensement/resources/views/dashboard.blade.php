<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        {{-- <link rel="stylesheet" href="{{asset('assets/css/pagination.css')}}"> --}}
    <title>Admin | Dashboard</title>
</head>
<body>
    <div class="p-2">
        <section class="pt-2 row d-flex justify-content-between">
            <div class="col-4 d-flex flex-column text-center align-items-center">
                <img src="{{asset('assets/images/logo.jpg')}}" alt="Logo" height="128" width="128">
                <h4 class="text-uppercase fw-bold">Concorde nationale</h4>
            </div>
            <div class="col-8 d-flex flex-column justify-content-center">
                <div class="row d-flex justify-content-end align-items-center">
                    <div class="col-12 d-flex row p-3 justify-content-end">
                        <div class="col-2 p-2 bg-success rounded text-center">
                            <p class="m-0 text-white fw-bold">Inscrits : {{ $nbrInscrit }}</p>
                        </div>
                        <div class="col-2 px-4 d-flex justify-content-end">
                            <a href="{{route('admin.export-data')}}" class="btn btn-success">Exporter</a>
                        </div>

                        <div class="col-2 d-flex justify-content-end">
                            <a href="{{route('admin.logout')}}" class="btn btn-danger">Déconnexion</a>
                        </div>
                        <form class="col-6 d-flex justify-content-end">
                            <input class="form-control me-2" type="search" placeholder="Rechercher" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Rechercher</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <section class="flex-column justify-content-center">
            <h1 class="text-center">Liste des inscrits</h1>

                <table class="table">
                    <thead>
                        <tr class="table-success">
                            <th scope="col">Nom</th>
                            <th scope="col">Prenoms</th>
                            <th scope="col">Sexe</th>
                            <th scope="col">Numéro</th>
                            <th scope="col">Autre Numéro</th>
                            <th scope="col">Email</th>
                            <th scope="col">Pays</th>
                            <th scope="col">Ville</th>
                            <th scope="col">Parrain</th>
                            <th scope="col">Electeur</th>
                            <th scope="col">PDCI-RDA</th>
                        </tr>
                    </thead>
                    <tbody class="">
                        @foreach ($users as $user)
                            <tr class="">
                                <td scope="row">{{$user->nom}}</td>
                                <td>{{$user->prenoms}}</td>
                                <td>{{$user->sexe}}</td>
                                <td>{{$user->numero}}</td>
                                <td>{{$user->autre_numero}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->pays}}</td>
                                <td>{{$user->ville}}</td>
                                <td>{{$user->parrain}}</td>
                                <td>{{$user->electeur}}</td>
                                <td>{{$user->pdci_rda}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="pagination">
                    {{$users->links()}}
                </div>
        </section>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous">
    </script>
</body>
</html>
