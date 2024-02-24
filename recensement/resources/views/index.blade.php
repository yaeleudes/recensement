<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Concorde | formulaire</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <div class="container">
        <header class="text-center row">
            <div class="col">
                <img src="{{ asset('assets/images/logo1.jpg') }}" alt="Logo" height="" width="" class="img-fluid">
            </div>
            <h1 class="text-uppercase fw-bold">Concorde nationale</h1>
            {{-- <p>Ce formulaire est créé pour recueillir les informations récentes sur les adhérents à Concorde Nationale et mettre à jour la base de données. Merci de votre participation !</p> --}}
        </header>
        <section class="p-2">
            <p class="text-danger">* Indique une question obligatoire</p>
            {{-- Gerer les erreurs --}}
            @if ($errors->any())
                <div class="arlet arlet-danger">
                    <ul class="list-group">
                        @foreach ( $errors->all() as $error )
                            <li class="alert alert-danger text-center list-group-item list-group-item-danger">
                                {{ $error }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
            {{-- Le formulaire --}}
            <form method="POST" action="{{ route('formulaire.post') }}">
                @csrf

                {{-- ________________________________________________________ INFORMATIONS PERSONNELLES ________________________________________________________ --}}
                {{-- Le champs pour le nom --}}
                <div class="mb-3">
                    <label for="nom" class="form-label fw-bold">Nom <span class="text-danger fw-normal">(sans ' et - )</span><span class="text-danger"> *</span></label>
                    <input type="text" name="nom" class="form-control" id="nom" placeholder="Votre Nom" value="{{ old('nom') }}" required>
                    @error('nom')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                {{-- Le champs pour le prenom --}}
                <div class="mb-3">
                    <label for="prenoms" class="form-label fw-bold">Prénom(s) <span
                            class="text-danger"><span class="text-danger fw-normal">(sans ' et - )</span><span class="text-danger"> *</span></label>
                    <input type="text" name="prenoms" class="form-control" id="prenoms" placeholder="Vos Prenoms" value="{{ old('prenoms') }}" required>
                    @error('prenoms')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                {{-- Les champs pour le sexe --}}
                <div class="mb-3">
                    <label class="fw-bold">Sexe <span class="text-danger">*</span></label>
                    <div class="d-flex justify-content-evenly mt-2">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="sexe" value="Masculin"
                                value="{{ old('sexe') }}" id="M" checked>
                            <label class="form-check-label" for="M">
                                Masculin
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="sexe" value="Feminin"
                                value="{{ old('sexe') }}" id="F">
                            <label class="form-check-label" for="F">
                                Féminin
                            </label>
                        </div>
                    </div>
                </div>
                {{-- Le champs pour le numero --}}
                <div class="mb-3">
                    <label class="fw-bold">Téléphone WhatsApp <span class="text-danger">*</span></label>
                    <div class="row mt-2">
                        <div class="col">
                            <select id="indicatif" class="form-select form-select-sm" name="idwhatsapp" required>
                                <option selected value="+255"><span class="fs-6">Côte d'Ivoire : +225</span></option>
                                @foreach ($paysData as $pays)
                                    <option value="{{ $pays['indicatif'] }}">{{ $pays['nom'] }} :
                                        {{ $pays['indicatif'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <input type="tel" name="numero" class="form-control" placeholder="Votre numéro" value="{{ old('numero') }}" required>
                            @error('numero')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                {{-- Le champs pour l'autre numéro --}}
                <div class="mb-3">
                    <label class="fw-bold">Autre téléphone</label>
                    <div class="row mt-2">
                        <div class="col">
                            <select class="form-select form-select-sm" name="idphone">
                                <option selected value="+255"><span class="fs-6">Côte d'Ivoire : +225</span>
                                </option>
                                @foreach ($paysData as $pays)
                                    <option value="{{ $pays['indicatif'] }}">{{ $pays['nom'] }} :
                                        {{ $pays['indicatif'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <input type="tel" name="autre_numero" class="form-control" placeholder="Votre numéro" value="{{ old('autre_numero') }}">
                        </div>
                    </div>
                </div>
                {{-- ________________________________________________________ ZONE DE RATTACHEMENT ________________________________________________________ --}}

                <div class="mb-3">
                    <label class=" mb-2">Je souhaite intégrer la <span class="fw-bold">Coordination Concorde Nationale</span> de la zone suivante : (Choisir une seule zone où vous votez)<span class="text-danger fw-bold">*</span></label>
                    <select class="form-select" name="zone_rattachement" id="zone_rattachement" onchange="afficherMenu()">
                        <option selected value="0000"><span class="fs-6">-- Choisir une seule zone où vous votez --</option>
                        <option value="Abidjan"><span class="fs-6">Abidjan</option>
                        <option value="interieur"><span class="fs-6">Interieur du pays</option>
                        <option value="horspays"><span class="fs-6">Hors du pays</option>
                    </select>
                </div>

                {{-- Menu déroulant pour la commune --}}
                <div class="mb-3" id="ma_commune">
                    <label class="fw-bold mb-2">Sélectionnez une commune d'Abidjan : <span class="text-danger">*</span></label>
                    <select class="form-select" name="ma_commune" id="ma_commune" required>
                        <option value="abobo">Abobo</option>
                        <option value="adjame">Adjamé</option>
                        <option value="attecoube">Attécoubé</option>
                        <option value="cocody">Cocody</option>
                        <option value="koumassi">Koumassi</option>
                        <option value="marcory">Marcory</option>
                        <option value="plateau">Plateau</option>
                        <option value="portbouet">Port-Bouët</option>
                        <option value="treichville">Treichville</option>
                        <option value="yopougon">Yopougon</option>
                    </select>
                </div>

                {{-- Menu déroulant pour le choix du Chef-lieu de Région de provenance --}}
                <div class="mb-3" id="mon_chef_lieu">
                    <label class="fw-bold mb-2" for="chef_lieu" id="chef_lieu_label">Selectionnez votre Chef-lieu de Région de provenance<span class="text-danger">*</span></label>
                    <select class="form-select mb-3" name="mon_chef_lieu" id="mon_chef_lieu" required>
                        <option value="Abengourou" selected>Abengourou</option>
                        <option value="Abidjan">Abidjan</option>
                        <option value="Aboisso">Aboisso</option>
                        <option value="Adzopé">Adzopé</option>
                        <option value="Agboville">Agboville</option>
                        <option value="Bongouanou">Bongouanou</option>
                        <option value="Bondoukou">Bondoukou</option>
                        <option value="Bouaflé">Bouaflé</option>
                        <option value="Bouaké">Bouaké</option>
                        <option value="Bouna">Bouna</option>
                        <option value="Dabou">Dabou</option>
                        <option value="Daloa">Daloa</option>
                        <option value="Daoukro">Daoukro</option>
                        <option value="Dimbokro">Dimbokro</option>
                        <option value="Divo">Divo</option>
                        <option value="Duékoué">Duékoué</option>
                        <option value="Ferkessédougou">Ferkessédougou</option>
                        <option value="Gagnoa">Gagnoa</option>
                        <option value="Guiglo">Guiglo</option>
                        <option value="Katiola">Katiola</option>
                        <option value="Korhogo">Korhogo</option>
                        <option value="Mankono">Mankono</option>
                        <option value="Minignan">Minignan</option>
                        <option value="Odienné">Odienné</option>
                        <option value="San-Pédro">San-Pédro</option>
                        <option value="Sassandra">Sassandra</option>
                        <option value="Séguéla">Séguéla</option>
                        <option value="Soubré">Soubré</option>
                        <option value="Touba">Touba</option>
                        <option value="Toumodi">Toumodi</option>
                        <option value="Yamoussoukro">Yamoussoukro</option>
                    </select>
                </div>

                {{-- Menu déroulant pour le choix du pays--}}
                <div class="mb-3" id="pays">
                    <label class="fw-bold mb-2">Selectionnez un pays <span class="text-danger">*</span></label>
                    <select class="form-select" name="pays" id="pays" required>
                        {{-- <option selected value="Côte d'Ivoire"><span class="fs-6">Côte d'<I></I>Ivoire</span></option> --}}
                        @foreach ($paysData as $pays)
                            <option value="{{ $pays['nom'] }}">{{ $pays['nom'] }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- Champs pour le nom du parrain --}}
                <div class="mb-3">
                    <label for="parrain" class="form-label fw-bold">Votre parrain (celui qui vous fait connaître
                        CONCORDE)
                        <span class="text-danger">*</span></label>
                    <input type="text" name="parrain" class="form-control" id="parrain" value="Moi-même"
                        value="{{ old('parrain') }}" onclick="selectText(this)">
                    @error('parrain')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- ________________________________________________________ AUTRES INFORMATIONS SPECIFIQUES ________________________________________________________ --}}
                {{-- Bouton pour electeurs --}}
                <div class="mb-3">
                    <label class="fw-bold">Etes-vous électeur ? <span class="text-danger">*</span></label>
                    <div class="d-flex justify-content-evenly mt-2">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="electeur" id="Ye" value="Oui" checked>
                            <label class="form-check-label" for="Ye">Oui</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="electeur" id="Ne" value="Non">
                            <label class="form-check-label" for="Ne">Non</label>
                        </div>
                    </div>
                </div>
                {{-- Bouton pour partie --}}
                <div class="mb-3">
                    <label class="fw-bold">Etes-vous militant du PDCI-RDA ? <span class="text-danger">*</span></label>
                    <div class="d-flex justify-content-evenly mt-2">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pdci" id="Yp" value="Oui" checked>
                            <label class="form-check-label" for="Yp">Oui</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pdci" id="Np" value="Non">
                            <label class="form-check-label" for="Np"></label>
                        </div>
                    </div>
                </div>
                {{-- Bouton pour la piece --}}
                <div class="mb-3">
                    <label class="fw-bold">Avez-vous une pièce d'identité en cours de validité ?<span class="text-danger">*</span></label>
                    <div class="d-flex justify-content-evenly mt-2">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="ma_piece" id="Yma_piece" value="Oui" checked>
                            <label class="form-check-label" for="Yma_piece">Oui</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="ma_piece" id="Nma_piece" value="Non">
                            <label class="form-check-label" for="Nma_piece">Non</label>
                        </div>
                    </div>
                </div>
                {{-- Bouton pour choix de la piece --}}
                <div class="mb-3">
                    <label class="fw-bold">Quelle est sa nature ?<span class="text-danger">*</span></label>
                    <div class="flex-column mt-2 ms-2">
                        <div class="form-check d-flex">
                            <input class="form-check-input" type="radio" name="nature_piece" id="CNI" value="CNI" checked>
                            <label class="form-check-label" for="CNI">CNI</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="nature_piece" id="Carte d'électeur" value="Carte d'électeur">
                            <label class="form-check-label" for="Carte d'électeur">Carte d'électeur</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="nature_piece" id="Passeport" value="Passeport">
                            <label class="form-check-label" for="Passeport">Passeport</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="nature_piece" id="Attestation d'identité" value="Attestation d'identité">
                            <label class="form-check-label" for="Attestation d'identité">Attestation d'identité</label>
                        </div>
                    </div>
                </div>

                <p class="text-danger fs-smaller"><i class="bi bi-exclamation-triangle-fill fw-bold"> </i> Merci de vérifier
                    les informations saisies avant de cliquer sur <span class="fw-bold">Envoyer</span> pour éviter les
                    erreurs. </p>
                {{-- <button type="submit" class="btn btn-success px-4">Envoyer</button> --}}
            </form>
        </section>
    </div>

    {{-- Script JS --}}
    <script>
        function selectText(input) {
            input.select();
        };
        function afficherMenu() {
            var ma_zone = document.getElementById("zone_rattachement");
            var ma_commune = document.getElementById("ma_commune");
            var mon_chef_lieu = document.getElementById("mon_chef_lieu");
            var pays = document.getElementById("pays");

            switch(ma_zone.value){
                case "Abidjan" :
                    ma_commune.style.display = "block";
                    mon_chef_lieu.style.display = "none";
                    pays.style.display = "none";
                    console.log("test 1");
                    break;
                case "interieur" :
                    ma_commune.style.display = "none";
                    mon_chef_lieu.style.display = "block";
                    pays.style.display = "none";
                    console.log("test 2");
                    break;
                case "horspays" :
                    ma_commune.style.display = "none";
                    mon_chef_lieu.style.display = "none";
                    pays.style.display = "block";
                    console.log("test 3");
                    break;
                default :
                    ma_commune.style.display = "none";
                    mon_chef_lieu.style.display = "none";
                    pays.style.display = "none";
                    console.log("test 3");
            }
        };
        afficherMenu();
        document.querySelectorAll('input[type="text"]').forEach(function(input) {
            input.addEventListener('input', function(event) {
                let inputValue = event.target.value;
                let regex = /^[a-zA-Z\s]*$/;
                if (!regex.test(inputValue)) {
                    event.target.value = inputValue.slice(0, -1);
                }
            });
        });
        document.querySelectorAll('input[type="tel"]').forEach(function(input) {
            input.addEventListener('input', function(event) {
                let telValue = event.target.value;
                let regexTel = /^\d*$/;
                if (!regexTel.test(telValue)) {
                    event.target.value = telValue.replace(/\D/g, '');
                }
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
