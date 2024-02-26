<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="icon" href="{{ asset('assets/images/logo.ico') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('assets/images/logo.ico') }}" type="image/x-icon">
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
                            <a href="{{route('admin.dashboard')}}" class="btn btn-success px-4"><i class="bi bi-arrow-left-square fw-bold"> </i> Retour</a>
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
        {{-- Section Tableau --}}
        <section class="flex-column justify-content-center p-2 rounded">
            <h1 class="text-center">Liste des archivés</h1>
                <table class="table">
                    <thead>
                        <tr class="table-success">
                            <th scope="col">Nom</th>
                            <th scope="col">Prenoms</th>
                            <th scope="col">Sexe</th>
                            <th scope="col">Numéro</th>
                            {{-- <th scope="col">Autre Numéro</th> --}}
                            <th scope="col">Zone de rattachement</th>
                            <th scope="col">Zone de vote</th>
                            <th scope="col">Pièce d'identité</th>
                            <th scope="col">Parrain</th>
                            <th scope="col">Electeur</th>
                            <th scope="col">Militant du PDCI-RDA</th>
                            <th scope="col">Date d'inscrtion</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="">
                        @foreach ($usersArchive as $user)
                            <tr class="">
                                <td scope="row">
                                    {{$user->nom}}
                                </td>
                                <td>{{$user->prenoms}}</td>
                                <td>{{$user->sexe}}</td>
                                <td>{{$user->numero}}</td>
                                <td>{{$user->zone_rattachement}}</td>
                                <td>{{$user->zone_vote}}</td>
                                <td>{{$user->ma_piece}}</td>
                                <td>{{$user->parrain}}</td>
                                <td>{{$user->electeur}}</td>
                                <td>{{$user->pdci_rda}}</td>
                                <td>{{$user->created_at->format('d-m-Y')}}</td>
                                <td class="row d-flex justify-content-between">
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <h5 class="text-center">Voullez-vous vraiment supprimer cet utilisateur ?</h5>
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="{{ route('admin.destroy', $user->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-success">Je confirme</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal 2 -->
                                    <div class="modal fade" id="exampleModa2{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabe2" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <h5 class="text-center">Voullez-vous vraiment archiver cet utilisateur ?</h5>
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="{{ route('admin.archive', $user->id) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit" class="btn btn-success">Je confirme</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal 3 -->
                                    <div class="modal fade" id="exampleModa3{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabe3" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <h5 class="text-center">Voullez-vous vraiment restaurer cet utilisateur ?</h5>
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="{{ route("admin.restore", $user->id) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit" class="btn btn-success">Je confirme</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        @if ($user->archive === 'Non')
                                            <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModa2{{$user->id}}"><i class="bi bi-box-arrow-down"></i></button>
                                        @else
                                            <button type="submit" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModa3{{$user->id}}"><i class="bi bi-box-arrow-up"></i></button>
                                        @endif
                                    </div>
                                    <div class="col-6">
                                        <button type="submit" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal{{$user->id}}"><i class="bi bi-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="pagination">
                    {{$usersArchive->links()}}
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
