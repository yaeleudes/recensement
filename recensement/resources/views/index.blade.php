<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Concorde | formulaire</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="icon" href="{{ asset('assets/images/logo.ico') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('assets/images/logo.ico') }}" type="image/x-icon">
</head>
<body>
    <div class="container">
        <header class="text-center">
            <div class="col">
                <img src="{{ asset('assets/images/logo1.jpg') }}" alt="Logo" height="" width="" class="img-fluid">
            </div>
            <img src="{{ asset('assets/images/logo.jpg') }}" alt="Logo" height="128" width="128">
            <h1 class="text-uppercase fw-bold">Formulaire d'adhésion à concorde nationale</h1>
            {{-- <div class="row d-flex">
                <div class="col"><img src="{{ asset('assets/images/logo.jpg') }}" alt="Logo" height="128" width="128"></div>
                <div class="col"><h2 class="text-uppercase fw-bold">Formulaire d'adhésion à concorde nationale</h2></div>
                <div class="col"><img src="{{ asset('assets/images/logo.jpg') }}" alt="Logo" height="128" width="128"></div>
            </div> --}}

            {{-- <p>Ce formulaire est créé pour recueillir les informations récentes sur les adhérents à Concorde Nationale et mettre à jour la base de données. Merci de votre participation !</p> --}}
            {{-- <p>Ce formulaire est créé pour recueillir les informations sur les adhérents à Concorde Nationale. En remplissant, vous autorisez <span class="fw-bold text-uppercase">uniquement</span>
                Concorde Nationale à en faire usage dans le cadre des actions pour la victoire de notre Champion, <span class="fw-bold">Président du PDCI-RDA, le Ministre Cheick Tidjane THIAM</span>
            </p> --}}
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
                    <label for="nom" class="form-label fw-bold">1) Nom <span class="text-danger fw-normal">(sans ' et - )</span><span class="text-danger"> *</span></label>
                    <input type="text" name="nom" class="form-control" id="nom" placeholder="Votre Nom" value="{{ old('nom') }}" pattern="^[a-zA-Z\s]*$" required>
                    @error('nom')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                {{-- Le champs pour le prenom --}}
                <div class="mb-3">
                    <label for="prenoms" class="form-label fw-bold">2) Prénom(s) <span
                            class="text-danger"><span class="text-danger fw-normal">(sans ' et - )</span><span class="text-danger"> *</span></label>
                    <input type="text" name="prenoms" class="form-control" id="prenoms" placeholder="Vos Prénoms" value="{{ old('prenoms') }}" required>
                    @error('prenoms')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                {{-- Les champs pour le sexe --}}
                <div class="mb-3">
                    <label class="fw-bold">3) Sexe <span class="text-danger">*</span></label>
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
                    <label class="fw-bold">4) Téléphone WhatsApp <span class="text-danger">*</span></label>
                    <div class="row mt-2">
                        <div class="col">
                            <select id="indicatif" class="form-select form-select-sm" name="idwhatsapp" required>
                                <option selected value="+225"><span class="fs-6">Côte d'Ivoire : +225</span></option>
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
                    <label class="fw-bold">5) Autre téléphone</label>
                    <div class="row mt-2">
                        <div class="col">
                            <select class="form-select form-select-sm" name="idphone">
                                <option selected value="+225"><span class="fs-6">Côte d'Ivoire : +225</span>
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
                    <label class=" mb-2"><span class="fw-bold">6)</span> Je souhaite intégrer la <span class="fw-bold">Coordination Concorde Nationale</span> de la zone suivante : (<span class="fst-italic">Choisir une seule zone où vous votez</span>)<span class="text-danger fw-bold">*</span></label>
                    <select class="form-select" name="zone_rattachement" id="zone_rattachement" onchange="afficherMenu()" required>
                        <option selected value=""><span class="fs-6">Choisir une seule zone où vous votez</option>
                        <option value="Abidjan"><span class="fs-6">Abidjan</option>
                        <option value="Intérieur du pays"><span class="fs-6">Intérieur du pays</option>
                        <option value="Hors du pays"><span class="fs-6">Hors du pays</option>
                    </select>
                </div>

                {{-- Menu déroulant pour la commune --}}
                <div class="mb-3" id="ma_commune">
                    <label class="fw-bold mb-2">Sélectionnez une commune d'Abidjan : <span class="text-danger">*</span></label>
                    <select class="form-select" name="ma_commune" id="ma_commune" required>
                        <option value="abobo">Abobo</option>
                        <option value="adjame">Adjamé</option>
                        <option value="anyama">Anyama</option>
                        <option value="attecoube">Attécoubé</option>
                        <option value="bingerville">Bingerville</option>
                        <option value="cocody">Cocody</option>
                        <option value="koumassi">Koumassi</option>
                        <option value="marcory">Marcory</option>
                        <option value="plateau">Plateau</option>
                        <option value="portbouet">Port-Bouët</option>
                        <option value="songon">Songon</option>
                        <option value="treichville">Treichville</option>
                        <option value="yopougon">Yopougon</option>
                    </select>
                </div>

                {{-- Menu déroulant pour le choix du Chef-lieu de Région de vote --}}
                <div class="mb-3" id="mon_chef_lieu">
                    <label class="fw-bold mb-2" for="chef_lieu" id="chef_lieu_label">Selectionnez votre Chef-lieu de Région de vote<span class="text-danger">*</span></label>
                    <select class="form-select mb-3" name="mon_chef_lieu" id="mon_chef_lieu" required>
                        <option value="Abengourou" selected>Abengourou</option>
                        <option value="Aboisso">Aboisso</option>
                        <option value="Adiaké">Adiaké</option>
                        <option value="Adzopé">Adzopé</option>
                        <option value="Agboville">Agboville</option>
                        <option value="Agnibilékrou">Agnibilékrou</option>
                        <option value="Akoupé">Akoupé</option>
                        <option value="Alépé">Alépé</option>
                        <option value="Arrah">Arrah</option>
                        <option value="Attiégouakro">Attiégouakro</option>
                        <option value="Bangolo">Bangolo</option>
                        <option value="Bettié">Bettié</option>
                        <option value="Béoumi">Béoumi</option>
                        <option value="Biankouma">Biankouma</option>
                        <option value="Bloléquin">Bloléquin</option>
                        <option value="Bocanda">Bocanda</option>
                        <option value="Bondoukou">Bondoukou</option>
                        <option value="Bongouanou">Bongouanou</option>
                        <option value="Bonon">Bonon</option>
                        <option value="Bouaflé">Bouaflé</option>
                        <option value="Bouaké">Bouaké</option>
                        <option value="Bouna">Bouna</option>
                        <option value="Boundiali">Boundiali</option>
                        <option value="Botro">Botro</option>
                        <option value="Buyo">Buyo</option>
                        <option value="Dabakala">Dabakala</option>
                        <option value="Dabou">Dabou</option>
                        <option value="Daloa">Daloa</option>
                        <option value="Danané">Danané</option>
                        <option value="Daoukro">Daoukro</option>
                        <option value="Dimbokro">Dimbokro</option>
                        <option value="Divo">Divo</option>
                        <option value="Duékoué">Duékoué</option>
                        <option value="Dianra">Dianra</option>
                        <option value="Didiévi">Didiévi</option>
                        <option value="Dikodougou">Dikodougou</option>
                        <option value="Djékanou">Djékanou</option>
                        <option value="Doropo">Doropo</option>
                        <option value="Facobly">Facobly</option>
                        <option value="Ferkessédougou">Ferkessédougou</option>
                        <option value="Fresco">Fresco</option>
                        <option value="Gagnoa">Gagnoa</option>
                        <option value="Gbéléban">Gbéléban</option>
                        <option value="Gohitafla">Gohitafla</option>
                        <option value="Grand-Bassam">Grand-Bassam</option>
                        <option value="de Grand-Lahou">Grand-Lahou</option>
                        <option value="Guiglo">Guiglo</option>
                        <option value="Guitry">Guitry</option>
                        <option value="Guéyo">Guéyo</option>
                        <option value="Issia">Issia</option>
                        <option value="Jacqueville">Jacqueville</option>
                        <option value="Kani">Kani</option>
                        <option value="Kaniasso">Kaniasso</option>
                        <option value="Katiola">Katiola</option>
                        <option value="Korhogo">Korhogo</option>
                        <option value="Koro">Koro</option>
                        <option value="Kouably">Kouably</option>
                        <option value="Kouassi-Kouassikro">Kouassi-Kouassikro</option>
                        <option value="Kouibly">Kouibly</option>
                        <option value="Koun-Fao">Koun-Fao</option>
                        <option value="Kounahiri">Kounahiri</option>
                        <option value="Kouto">Kouto</option>
                        <option value="Kong">Kong</option>
                        <option value="Lakota">Lakota</option>
                        <option value="Madinani">Madinani</option>
                        <option value="Man">Man</option>
                        <option value="Mankono">Mankono</option>
                        <option value="Minignan">Minignan</option>
                        <option value="M’Bahiakro">M’Bahiakro</option>
                        <option value="M’Batto">M’Batto</option>
                        <option value="M’Bengué">M’Bengué</option>
                        <option value="Méagui">Méagui</option>
                        <option value="Nassian">Nassian</option>
                        <option value="Niakaramadougou">Niakaramadougou</option>
                        <option value="Odienné">Odienné</option>
                        <option value="Ouaninou">Ouaninou</option>
                        <option value="Ouellé">Ouellé</option>
                        <option value="Ouangolodougou">Ouangolodougou</option>
                        <option value="Oumé">Oumé</option>
                        <option value="Prikro">Prikro</option>
                        <option value="San-Pédro">San-Pédro</option>
                        <option value="Sakassou">Sakassou</option>
                        <option value="Samatiguila">Samatiguila</option>
                        <option value="Sassandra">Sassandra</option>
                        <option value="Séguéla">Séguéla</option>
                        <option value="Séguélon">Séguélon</option>
                        <option value="Sikensi">Sikensi</option>
                        <option value="Sinématiali">Sinématiali</option>
                        <option value="Sinfra">Sinfra</option>
                        <option value="Sipilou">Sipilou</option>
                        <option value="Soubré">Soubré</option>
                        <option value="Tiapoum">Tiapoum</option>
                        <option value="Tiassalé">Tiassalé</option>
                        <option value="Tiébissou">Tiébissou</option>
                        <option value="Tanda">Tanda</option>
                        <option value="Taï">Taï</option>
                        <option value="Taabo">Taabo</option>
                        <option value="Tabou">Tabou</option>
                        <option value="Téhini">Téhini</option>
                        <option value="Tengréla">Tengréla</option>
                        <option value="Touba">Touba</option>
                        <option value="Toulepleu">Toulepleu</option>
                        <option value="Toumodi">Toumodi</option>
                        <option value="Transua">Transua</option>
                        <option value="Vavoua">Vavoua</option>
                        <option value="Yakassé-Attobrou">Yakassé-Attobrou</option>
                        <option value="Yamoussoukro">Yamoussoukro</option>
                        <option value="Zuénoula">Zuénoula</option>
                        <option value="Zouan-Hounien">Zouan-Hounien</option>
                        <option value="Zoukougbeu">Zoukougbeu</option>
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
                    <label for="parrain" class="form-label fw-bold">7) Votre parrain <span class="fw-normal fst-italic">(celui qui vous a fait connaître
                        CONCORDE)</span>
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
                    <label class="fw-bold">8) Etes-vous électeur ? <span class="text-danger">*</span></label>
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
                    <label class="fw-bold">9) Etes-vous militant du PDCI-RDA ? <span class="text-danger">*</span></label>
                    <div class="d-flex justify-content-evenly mt-2">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pdci" id="Yp" value="Oui" checked>
                            <label class="form-check-label" for="Yp">Oui</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pdci" id="Np" value="Non">
                            <label class="form-check-label" for="Np">Non</label>
                        </div>
                    </div>
                </div>
                {{-- Bouton pour la piece --}}
                <div class="mb-3">
                    <label class="fw-bold">10) Avez-vous une pièce d'identité en cours de validité ?<span class="text-danger">*</span></label>
                    <div class="d-flex justify-content-evenly mt-2">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="ma_piece" id="Yma_piece" value="Oui" onchange="afficheIdent()" checked>
                            <label class="form-check-label" for="Yma_piece">Oui</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="ma_piece" id="Nma_piece" value="Non" onchange="afficheIdent()">
                            <label class="form-check-label" for="Nma_piece">Non</label>
                        </div>
                    </div>
                </div>
                {{-- Bouton pour choix de la piece --}}
                <div class="mb-3" id="zone_piece">
                    <label class="fw-bold">11) Quelle est sa nature ?<span class="text-danger">*</span></label>
                    <div class="flex-column mt-2 ms-2">
                        <div class="form-check">
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
                <button type="submit" class="btn btn-success px-4">Envoyer</button>
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
                case "Intérieur du pays" :
                    ma_commune.style.display = "none";
                    mon_chef_lieu.style.display = "block";
                    pays.style.display = "none";
                    console.log("test 2");
                    break;
                case "Hors du pays" :
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
        function afficheIdent() {
            var choix = document.querySelector('input[name = "ma_piece"]:checked').value;
            var choix_piece = document.getElementById('zone_piece');

            switch(choix){
                case 'Oui' :
                    choix_piece.style.display = "block";
                    break;
                case 'Non' :
                    choix_piece.style.display = "none";
                    break;
            }
        }
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

        function afficherOptions() {
            // Récupération de la valeur saisie dans le champ de texte
            var saisie = document.getElementById("villesInput").value.toLowerCase();
            // Récupération de toutes les options du select
            var options = document.getElementById("villesSelect").options;
            // Parcours de toutes les options pour déterminer si elles correspondent à la saisie
            for (var i = 0; i < options.length; i++) {
                // Si la saisie correspond à une option, afficher le select et laisser l'option sélectionnée
                if (options[i].value.toLowerCase().startsWith(saisie)) {
                document.getElementById("villesSelect").style.display = "block";
                options[i].selected = true;
                return;
                }
            }
            // Si aucune correspondance, cacher le select
            document.getElementById("villesSelect").style.display = "none";
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
