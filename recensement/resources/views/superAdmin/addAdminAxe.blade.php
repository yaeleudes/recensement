@extends('layouts.dashboardBase')
    @section('content')
        <div class="d-flex justify-content-center">
            <form class=" flex-column col-6 my-3" action="" method="POST">
                @csrf
                <h1 class="mb-3 text-uppercase">Ajouter un nouuvel administrateur</h1>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nom</label>
                    <input type="text" name="nom" class="form-control" id="exampleFormControlInput1" placeholder="">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Prénom</label>
                    <input type="text" name="prenom" class="form-control" id="exampleFormControlInput1" placeholder="">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Contact</label>
                    <input type="tel" name="contact" class="form-control" id="exampleFormControlInput1" placeholder="+XXX XXXXXXXXXX">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                </div>
                <div class="mb-3">
                    <label class="fw-bold mb-2">Sélectionnez l'axe associé à cet admin</label>
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Ouvrez le menu</option>
                        <option value="1">One</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success px-5">Ajouter</button>
            </form>
        </div>
    @endsection
