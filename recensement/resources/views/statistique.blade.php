@extends('layouts.dashboardBase')
    @section('content')
        <div class="flex-column">
            <div class="d-flex justify-content-center mb-2 p-0">
                <div class="col-3 flex-column justify-content-start p-3">
                    <div class="p-3 bg-white rounded-3 text-start text-success shadow-lg">
                        <div class="d-flex justify-content-between align-items-center">
                            <h2 class="fs-4 m-0">Inscrits</h2>
                            <i class="bi bi-people fs-1"> </i>
                        </div>
                        <div>
                            <p class="m-0 fw-bold px-0 text-start fs-1">{{ $users->count() }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-3 flex-column justify-content-start p-3 opacity-5">
                    <div class="p-3 bg-white rounded-3 text-start text-success shadow-lg">
                        <div class="d-flex justify-content-between align-items-center">
                            <h2 class="fs-4 m-0">Archivés</h2>
                            <i class="bi bi-box-arrow-down fs-1"> </i>
                        </div>
                        <div>
                            <p class="m-0 fw-bold px-0 text-start fs-1">{{ $users->where('archive', '=', 'Oui')->count() }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-3 flex-column justify-content-start p-3 opacity-5">
                    <div class="p-3 bg-white rounded-3 text-start text-success shadow-lg">
                        <div class="d-flex justify-content-between align-items-center">
                            <h2 class="fs-4 m-0">Hommes</h2>
                            <i class="bi bi-gender-male fs-1"> </i>
                        </div>
                        <div>
                            <p class="m-0 fw-bold px-0 text-start fs-1">{{$users->where('sexe', '=', 'Masculin')->count()}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-3 flex-column justify-content-start p-3 opacity-5">
                    <div class="p-3 bg-white rounded-3 text-start text-success shadow-lg">
                        <div class="d-flex justify-content-between align-items-center">
                            <h2 class="fs-4 m-0">Femmes</h2>
                            <i class="bi bi-gender-female fs-1"> </i>
                        </div>
                        <div>
                            <p class="m-0 fw-bold px-0 text-start fs-1">{{$users->where('sexe', '=', 'Feminin')->count()}}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="">
                <div class="d-flex justify-content-center px-0 row-col-3">
                    <div class="col-6 p-3">
                        <div class="shadow-lg bg-white rounded-4 p-3" style="height: 500px">
                            <div id="chart_div"></div>
                            {{-- <div id="chart_div"></div> --}}
                        </div>

                    </div>
                    <div class="col-3 p-3">
                        <div class="shadow-lg bg-white rounded-4 p-3" style="height: 500px;">
                            <div id="piechart_3d_1"></div>
                        </div>
                    </div>
                    <div class="col-3 p-3">
                        <div class="shadow-lg bg-white rounded-4 p-3" style="height: 500px;">
                            <div id="piechart_3d_2"></div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    @endsection
