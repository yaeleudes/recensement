@extends('layouts.dashboardBase')
    @section('content')
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
        <div class="flex-column justify-content-center">
            <section class="row d-flex justify-content-between my-4">
                <div class="col-3 d-flex justify-content-center p-0">
                    <div class="col-5 p-2 bg-success rounded text-center">
                        <p class="m-0 text-white fw-bold px-0"> <i class="bi bi-people fw-bold"> </i> Inscrits : {{ $users->count() }}</p>
                    </div>
                </div>
                <div class="col-3 d-flex justify-content-center p-0">
                    <div class="col-5 p-2 bg-success rounded text-center">
                        <p class="m-0 text-white fw-bold px-0"> <i class="bi bi-gender-male fw-bold"> </i>Hommes : {{$users->where('sexe', '=', 'Masculin')->count()}}</p>
                    </div>
                </div>
                <div class="col-3 d-flex justify-content-center p-0">
                    <div class="col-5 p-2 bg-success rounded text-center">
                        <p class="m-0 text-white fw-bold px-0"> <i class="bi bi-gender-female fw-bold"> </i> Femmes : {{$users->where('sexe', '=', 'Feminin')->count()}}</p>
                    </div>
                </div>
                <div class="col-3 d-flex justify-content-center p-0">
                    <div class="col-5 d-flex justify-content-center p-0">
                        <a href="{{route('admin.export-data')}}" class="btn btn-success px-4"><i class="bi bi-file-earmark-arrow-down-fill"> </i> Exporter</a>
                    </div>
                </div>
            </section>
            <h1 class="text-center">Liste des archivés</h1>
                <table class="table">
                    <thead>
                        <tr class="table-success">
                            <th scope="col">Date d'inscrtion</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Prénoms</th>
                            <th scope="col">Sexe</th>
                            <th scope="col">Numéro</th>
                            {{-- <th scope="col">Autre Numéro</th> --}}
                            <th scope="col">Zone de rattachement</th>
                            <th scope="col">Localité de vote</th>
                            <th scope="col">Pièce d'identité</th>
                            <th scope="col">Parrain</th>
                            <th scope="col">Electeur</th>
                            <th scope="col">Militant du PDCI-RDA</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="">
                        @foreach ($usersArchive as $user)
                            <tr class="">
                                <td class="mx-0 ps-1 pe-0">{{$user->created_at->format('d-m-Y')}}</td>
                                <td class="mx-0 px-0" scope="row">
                                    {{$user->nom}}
                                </td>
                                <td class="mx-0 px-0">{{$user->prenoms}}</td>
                                <td class="mx-0 px-0">{{$user->sexe}}</td>
                                <td class="mx-0 px-0">{{$user->numero}}</td>
                                <td class="mx-0 px-0">{{$user->zone_rattachement}}</td>
                                <td class="mx-0 px-0">{{$user->zone_vote}}</td>
                                <td class="mx-0 px-0">{{$user->ma_piece}}</td>
                                <td class="mx-0 px-0">{{$user->parrain}}</td>
                                <td class="mx-0 px-0">{{$user->electeur}}</td>
                                <td class="mx-0 px-0">{{$user->pdci_rda}}</td>
                                <td class="row d-flex justify-content-between mx-0 px-0">
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

                                    <div class="col-6 px-1">
                                        @if ($user->archive === 'Non')
                                            <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModa2{{$user->id}}"><i class="bi bi-box-arrow-down"></i></button>
                                        @else
                                            <button type="submit" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModa3{{$user->id}}"><i class="bi bi-box-arrow-up"></i></button>
                                        @endif
                                    </div>
                                    <div class="col-6 px-1">
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
        </div>
    @endsection
