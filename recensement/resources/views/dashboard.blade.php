<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
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
                        <div class="col-4 d-flex justify-content-end">
                            <a href="{{route('admin.export-data')}}" class="btn btn-success px-4"><i class="bi bi-download fw-bold"> </i> Exporter</a>
                        </div>
                        <form class="col-6 d-flex justify-content-end">
                            <input class="form-control me-2" type="search" name="recherche" placeholder="Rechercher" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Rechercher</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        @if (session('success'))
            <div class="row">
                <div class="col flex-column align-items-center justify-content-center">
                    <div class="alert alert-success mx-auto text-center">
                        {{session('success')}}
                    </div>
                </div>
            </div>
        @endif
        <section class="row d-flex justify-content-between my-4">
            <div class="col-4 d-flex justify-content-center">
                <div class="col-5 p-2 bg-success rounded text-center">
                    <p class="m-0 text-white fw-bold px-2"> <i class="bi bi-people fw-bold"> </i> Inscrits : {{ $nbrInscrit }}</p>
                </div>
            </div>
            <div class="col-4 d-flex justify-content-center">
                <div class="col-5 p-2 bg-success rounded text-center">
                    <p class="m-0 text-white fw-bold px-2"> <i class="bi bi-gender-male fw-bold"> </i>Hommes : {{$nbrH}}</p>
                </div>
            </div>
            <div class="col-4 d-flex justify-content-center">
                <div class="col-5 p-2 bg-success rounded text-center">
                    <p class="m-0 text-white fw-bold px-2"> <i class="bi bi-gender-female fw-bold"> </i> Femmes : {{$nbrF}}</p>
                </div>
            </div>
        </section>

        <section class="flex-column justify-content-center p-2 rounded">
            <h1 class="text-center">Liste des inscrits</h1>

                <table class="table">
                    <thead>
                        <tr class="table-success">
                            <th scope="col">Nom</th>
                            <th scope="col">Prenoms</th>
                            <th scope="col">Sexe</th>
                            <th scope="col">Numéro</th>
                            {{-- <th scope="col">Autre Numéro</th> --}}
                            <th scope="col">Email</th>
                            <th scope="col">Pays de résidence</th>
                            <th scope="col">Ville de résidence</th>
                            <th scope="col">Parrain</th>
                            <th scope="col">Electeur</th>
                            <th scope="col">PDCI-RDA</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody class="">
                        @foreach ($users as $user)
                            <tr class="">
                                <td scope="row">{{$user->nom}}</td>
                                <td>{{$user->prenoms}}</td>
                                <td>{{$user->sexe}}</td>
                                <td>{{$user->numero}}</td>
                                {{-- <td>{{$user->autre_numero}}</td> --}}
                                <td>{{$user->email}}</td>
                                <td>{{$user->pays}}</td>
                                <td>{{$user->ville}}</td>
                                <td>{{$user->parrain}}</td>
                                <td>{{$user->electeur}}</td>
                                <td>{{$user->pdci_rda}}</td>
                                <td>
                                    <form action="{{ route('admin.destroy', $user->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="pagination">
                    {{$users->links()}}
                </div>
                <div class="col-2 d-flex justify-content-start">
                    <a href="{{route('admin.logout')}}" class="btn btn-danger px-4"><i class="bi bi-box-arrow-left fw-bold"> </i> Déconnexion</a>
                </div>
        </section>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous">
    </script>
</body>
</html>
