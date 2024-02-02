<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <header class="text-center">
            <img src="download.png" alt="Logo">
            <h1 class="text-uppercase fw-bold">Concorde national</h1>
            <p>Ce formulaire est créé pour recueillir les informations récentes sur les adhérents à Concorde Nationale
                et mettre à jour la base de données. Merci pour votre confiance !</p>
        </header>
        <section class="p-2">
            <p class="text-danger">* Indique une question obligatoire</p>
            <form>
                <div class="mb-3">
                    <label for="nom" class="form-label fw-bold">Nom <span class="text-danger">*</span></label>
                    <input type="text" name="nom" class="form-control" id="nom">
                </div>

                <div class="mb-3">
                    <label for="prenoms" class="form-label fw-bold">Prénom(s) <span class="text-danger">*</span></label>
                    <input type="text" name="prenoms" class="form-control" id="prenoms">
                </div>

                <div class="mb-3">
                    <label class="fw-bold">Sexe <span class="text-danger">*</span></label>
                    <div class="d-flex justify-content-evenly mt-2">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="sexe" id="M" checked>
                            <label class="form-check-label" for="M">
                                Masculin
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="sexe" id="F">
                            <label class="form-check-label" for="F">
                                Féminin
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="sexe" id="A">
                            <label class="form-check-label" for="A">
                                Autre
                            </label>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="fw-bold">Téléphone WhatsApp <span class="text-danger">*</span></label>
                    <div class="row mt-2">
                        <div class="col-4">
                            <select class="form-select" name="idwhatsapp" required>
                                <option selected value="+225">+225</option>
                                <option value="+33">+33</option>
                                <option value="+233">+233</option>
                            </select>
                        </div>
                        <div class="col">
                            <input type="tel" name="whatsapp" class="form-control" required>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="fw-bold">Autre téléphone</label>
                    <div class="row mt-2">
                        <div class="col-4">
                            <select class="form-select" name="idphone">
                                <option selected value="+225">+225</option>
                                <option value="+33">+33</option>
                                <option value="+233">+233</option>
                            </select>
                        </div>
                        <div class="col">
                            <input type="tel" name="phone" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label fw-bold">Email</label>
                    <input type="email" class="form-control" id="email">
                </div>

                <div class="mb-3">
                    <label class="fw-bold mb-2">Pays de résidence <span class="text-danger">*</span></label>
                    <select class="form-select" name="pays" required>
                        <option selected value="Côte d'Ivoire">Côte d'Ivoire</option>
                        <option value="France">France</option>
                        <option value="Ghana">Ghana</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="fw-bold mb-2">Ville de résidence <span class="text-danger">*</span></label>
                    <select class="form-select" name="ville" required>
                        <option selected value="Yammoussoukro">Yammoussoukro</option>
                        <option value="Abidjan">Abidjan</option>
                        <option value="Bouaké">Bouaké</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="parrain" class="form-label fw-bold">Votre parrain (celui qui vous fait connaître
                        CONCORDE)
                        <span class="text-danger">*</span></label>
                    <input type="text" name="parrain" class="form-control" id="parrain">
                </div>

                <div class="mb-3">
                    <label class="fw-bold">Etes-vous électeur ? <span class="text-danger">*</span></label>
                    <div class="d-flex justify-content-evenly mt-2">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="electeur" id="Ye" checked>
                            <label class="form-check-label" for="Ye">
                                Oui
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="electeur" id="Ne">
                            <label class="form-check-label" for="Ne">
                                Non
                            </label>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="fw-bold">Etes-vous du PDCI-RDA ? <span class="text-danger">*</span></label>
                    <div class="d-flex justify-content-evenly mt-2">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pdci" id="Yp" checked>
                            <label class="form-check-label" for="Yp">
                                Oui
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pdci" id="Np">
                            <label class="form-check-label" for="Np">
                                Non
                            </label>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Envoyer</button>
            </form>
        </section>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>
