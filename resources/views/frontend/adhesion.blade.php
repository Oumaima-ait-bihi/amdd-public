@extends('frontend.layouts.app')
@section('title')
    <title>Adhésion |AMDD</title>
@endsection
@section('content')
    <style>
        .form-group {
            margin-bottom: 15px;
            width: 50%;
        }

        .form-title {
            font-weight: bold;
            margin-bottom: 10px;
        }

        .paiment {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 10px;

        }

        /* form */
        .mainForm {
            box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
            padding: 10px;
            border-radius: 5px;

        }

        @media (min-width:900px) {
            .mainForm {
                width: 60%;
            }
        }

        .type {
            background-color: #ccc;
            padding: 10px;
            width: 80%;

        }

        .type option {
            background-color: white;
        }

        .basicInfo {
            display: flex;
            width: 100%;
            justify-content: center;
        }

        .basicInfo div input {
            width: 90%;
        }

        .basicInfo div label {
            text-align: left;
            padding-left: 25px;
        }

        .basicheck div input {
            width: 15px;
            aspect-ratio: 1/1;

        }

        .basicheck div {
            display: flex;
            justify-content: center;
            gap: 3px;
        }

        .toLeft {
            text-align: left;
            padding-left: 25px;

        }

        .basicheck {
            justify-content: space-around;
        }

        .basicSelect div select {
            width: 90%;
        }

        .basicSelect div {
            width: 100%;
        }

        .basicSelect {
            width: 100%;
        }

        .etape2 {
            display: flex;
            height: 60vh;
            justify-content: space-evenly;
            flex-direction: column;
        }

        input["type:text"] {}

        .etape3 {
            height: fit-content;
            width: 100%;
            align-items: center;
            text-align: left;
            justify-content: space-evenly;
        }

        .etape3 div {
            width: 90%;
            text-align: left;

        }

        .checkboxes {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            margin-top: 20px;
            justify-content: space-around;


        }

        .checkboxes div {
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            justify-content: space-evenly;
            height: fit-content;
        }

        .checkboxes div label input {
            margin: 5px;
        }

        .type2 {
            width: 95% !important;
            background-color: white;
        }

        .stage {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        .stage div {
            display: flex;
            gap: 5px;
        }

        .form-check {
            margin-bottom: 8px;
        }

        .form-check label {
            display: inline-block;
            margin-bottom: 0;
            margin-right: 8px;
        }

        select,
        input[type="number"],
        input[type="tel"],
        input[type="text"],
        input[type="email"] {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        button {
            padding: 8px 16px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            float: center;
        }

        button:hover {
            background-color: #0056b3;
        }

        .tabs {
            /* height: 100vh; Set the container to full viewport height */
            display: block;
            align-items: center;
            /* Vertically center the content */
            justify-content: center;
            /* Horizontally center the content */
        }

        select {
            padding: 3px;

        }

        .imag {
            width: 40%;
            margin-bottom: 20px
        }
    </style>

    <main id="main">
        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs" data-aos="fade-in">
            <div class="container">
                <h2>Etre membre AMDD</h2>
                <p>Vous pouvez facilement trouver les outils qui vous conviennent. </p>
            </div>
        </div><!-- End Breadcrumbs -->

        <script>
            // Load regions from the first JSON file
            fetch('regions.json')
                .then(response => response.json())
                .then(data => {
                    const regionSelect = document.getElementById('regionSelect');

                    // Add options for each region
                    data.forEach(region => {
                        const option = document.createElement('option');
                        option.value = region.id;
                        option.text = region.region;
                        regionSelect.appendChild(option);
                    });
                });

            function updateCityList() {
                const regionId = document.getElementById('regionSelect').value;
                const citySelect = document.getElementById('citySelect');
                citySelect.innerHTML = '<option value="">Select a city</option>';

                // Load cities from the second JSON file
                fetch('ville.json')
                    .then(response => response.json())
                    .then(data => {
                        // Filter cities based on the selected region
                        const filteredCities = data.filter(city => city.region === regionId);

                        // Add options for each city
                        filteredCities.forEach(city => {
                            const option = document.createElement('option');
                            option.value = city.id;
                            option.text = city.ville;
                            citySelect.appendChild(option);
                        });
                    });
            }
        </script>

        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="mainForm container">
                <center>
                    <img src="{{ asset('frontend/img/logo-amdd.png') }}" alt="" class="imag">
                    <form method="POST" action="{{ route('adhesion.create') }}" onsubmit="return validateForm()">
                        @csrf
                        <div class="tabs">
                            {{-- <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
              <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Etape 1</button>
              </li>

              <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Etape 2</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Etape 3</button>
              </li>
            </ul> --}}

                        </div>
                        <div class="tab-content" id="pills-tabContent">

                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                aria-labelledby="pills-home-tab">
                                <div class="form-group">
                                    <label for="type" class="form-title">Type:</label>
                                    <select id="type" name="type" class="type" aria-placeholder="choose a form"
                                        required>
                                        <option value="preinscription" disabled selected hidden>Choose a form</option>
                                        <option value="preinscription">Préinscription</option>
                                        <option value="formation">Formation</option>
                                        <option value="avecPaiment">Avec Paiment</option>
                                        <option value="stage">Stage</option>
                                    </select>
                                    <div id="type-error-message" class="error-message" style="display: none;">Please select
                                        a form type.</div>
                                </div>
                                <div class="basicInfo">
                                    <div class="form-group">
                                        <label for="nom" class="form-title">Nom :</label>
                                        <input type="text" id="nom" name="nom" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="prenom" class="form-title">Prénom :</label>
                                        <input type="text" id="prenom" name="prenom" class="form-control" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-title">Sexe :</label>
                                    <div class="basicInfo basicheck">
                                        <div class="form-check">
                                            <input type="radio" id="sexe_masculin" name="sexe" value="male"
                                                class="form-check-input" required>
                                            <label for="sexe_masculin" class="form-check-label">Masculin</label>
                                        </div>
                                        <div class="form-check" class="form-title">
                                            <input type="radio" id="sexe_feminin" name="sexe" value="female"
                                                class="form-check-input" required>
                                            <label for="sexe_feminin" class="form-check-label">Féminin</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group w-100">
                                    <label for="telephone" class="toLeft form-title">Téléphone :</label>
                                    <input type="tel" id="telephone" name="telephone" class="type2 form-control w-80"
                                        required>
                                </div>
                                <div class="form-group w-100">
                                    <label for="email" class="toLeft  form-title">Email :</label>
                                    <input type="email" id="email" name="email" class="type2 form-control w-80"
                                        required>
                                </div>
                                <div class="form-group w-100">
                                    <label for="password" class="toLeft  form-title">Password :</label>
                                    <input type="password" id="password" name="password" class="type2 form-control w-80"
                                        required>
                                </div>

                                <div class="form-group " style="width:100%">
                                    <div class="basicInfo basicSelect">
                                        <div>
                                            <label for='region' class="form-title">Région :</label>
                                            <select id="regionSelect" onchange="updateCityList()">
                                                <option value="">Select a region</option>
                                            </select>
                                        </div>
                                        <div>
                                            <label for="ville" class="form-title">Ville :</label>
                                            <select id="citySelect">
                                                <option value="" class="form-title">Select a city</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class=" tab-pane fade w-100" id="pills-profile" role="tabpanel"
                                aria-labelledby="pills-profile-tab">
                                {{-- preinscription --}}
                                <div class="etape2 form-group w-100" id="preinscriptionInputs1" style="display: flex;">
                                    <div class="basicInfo">
                                        <div class="w-100">
                                            <label for="profession" class="form-title">Profession :</label>
                                            <input type="text" id="profession" name="profession"
                                                class="form-control">
                                        </div>
                                        <div class="w-100">
                                            <label for="specialite" class="form-title">Spécialité :</label>
                                            <input type="text" id="specialite" name="specialite"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div>
                                        <label for="annee_exper" class="toLeft form-title ">Années d'expérience :</label>
                                        <select name="annee_experience" id="annee_experience"
                                            class="type type2 form-control w-100">
                                            <option value="0">0 ans</option>
                                            <option value="1">1 ans</option>
                                            <option value="2">2 ans</option>
                                            <option value="3">3 ans</option>
                                            <option value="4">4 ans</option>
                                            <option value="5etplus">plus de 5 ans</option>
                                            {{-- <option value="bac5">Bac + 5</option> --}}
                                        </select>
                                    </div>
                                    <div>
                                        {{-- niveau d'etude --}}
                                        <label for="niveau_etude" class="toLeft form-title ">Niveau d'études :</label>
                                        <select name="niveau_etude" id="niveau_etude"
                                            class="type type2 form-control w-100">
                                            <option value="doctorat">Doctorat</option>
                                            <option value="master">Master</option>
                                            <option value="licence">Licence</option>
                                            <option value="tech">T/TS/Bac+2</option>
                                            <option value="bac">Bac</option>
                                            <option value="secondaire">niveau secondaire</option>
                                            <option value="preparatoie">Niveau préparatoire</option>
                                            <option value="elementaire">Niveau élémentaire</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label for="niveau_compétence_matière_technologie"
                                            class="toLeft form-title">Évaluez approximativement votre niveau de compétence
                                            en matière de technologie et d'informatique:</label>
                                        <select id="niveau_compétence_matière_technologie"
                                            name="niveau_compétence_matière_technologie"
                                            class="type type2 form-control w-100">
                                            <option value="debutant">Niveau débutant - sans connaissances de base.</option>
                                            <option value="intermédiaire">Niveau intermédiaire - Connaissance basique de
                                                l'utilisation du téléphone et de l'ordinateur de manière simple.</option>
                                            <option value="avance">Niveau avancé - Maîtrise solide de l'utilisation du
                                                téléphone et de l'ordinateur.</option>
                                            <option value="expert">Niveau expert ou professionnel - Spécialisation en
                                                programmation et en informatique, maîtrise très avancée de l'utilisation de
                                                la technologie.</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="etape2 etape3 form-group" id="stageInputs">
                                    <div>
                                        <label for="age" class="toLeft form-title">Âge :</label>
                                        <center>
                                            <input type="number" id="age" name="age"
                                                class="type2 form-control">
                                        </center>
                                    </div>
                                    <div>
                                        <label for="niveau_diplome" class="toLeft form-title">Niveau de diplôme :</label>
                                        <center>
                                            <select name="niveau_diplome" id="niveau_diplome" class="type2 form-control">
                                                <option value="Niveau-Bac">Niveau Bac</option>
                                                <option value="Bac">Bac</option>
                                                <option value="bac1">Bac + 1</option>
                                                <option value="bac2">Bac + 2</option>
                                                <option value="bac3">Bac + 3</option>
                                                <option value="bac4">Bac + 4</option>
                                                <option value="bac5">Bac + 5</option>
                                                <!-- Add other diploma levels here -->
                                            </select>
                                        </center>
                                    </div>
                                    <div class="stage" style="margin-left: 40px">
                                        <label class="toLeft form-title">Type de diplôme :</label>
                                        <div class="form-check">
                                            <input type="radio" id="TS" name="type_diplome" value="TS"
                                                class="form-check-input">
                                            <label for="TS" class="form-check-label">TS</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" id="dut" name="type_diplome" value="DUT"
                                                class="form-check-input">
                                            <label for="DUT" class="form-check-label">DUT</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" id="deug" name="type_diplome" value="DEUG"
                                                class="form-check-input">
                                            <label for="DEUG" class="form-check-label">DEUG</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" id="bts" name="type_diplome" value="BTS"
                                                class="form-check-input">
                                            <label for="BTS" class="form-check-label">BTS</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" id="est" name="type_diplome" value="EST"
                                                class="form-check-input">
                                            <label for="EST" class="form-check-label">EST</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" id="li" name="type_diplome" value="Licence"
                                                class="form-check-input">
                                            <label for="Licence" class="form-check-label">Licence</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" id="master" name="type_diplome" value="master"
                                                class="form-check-input">
                                            <label for="master" class="form-check-label">Master</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" id="Ingénierie" name="type_diplome" value="Ingénierie"
                                                class="form-check-input">
                                            <label for="Ingénierie" class="form-check-label">Ingénierie</label>
                                        </div>
                                        <div class="form-check">
                                            <label for="diplome_autre" class="form-check-label">Autre</label>
                                            <input type="text" id="autre" name="autre">
                                        </div>

                                    </div>
                                    <div class=" w-100">
                                        <label for="specialite1" class="form-title" style="margin-left:50px">Spécialité
                                            :</label>
                                        <center>
                                            <input type="text" id="specialite1" name="specialite1"
                                                class="form-control" style="width:85%;">
                                        </center>
                                    </div>
                                    <div class="stage" style="margin-left: 40px">
                                        <label class="toLeft form-title">Type de stage :</label>
                                        <div class="form-check">
                                            <input type="radio" id="SI" name="type_stage" value="SI"
                                                class="form-check-input">
                                            <label for="SI" class="form-check-label">Stage d'initiation</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" id="Sfe" name="type_stage" value="Sfe"
                                                class="form-check-input">
                                            <label for="SI" class="form-check-label">Stage de fin de
                                                Formation</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" id="Slibre" name="type_stage" value="Slibre"
                                                class="form-check-input">
                                            <label for="Slibre" class="form-check-label">Stage libre</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" id="PFE" name="type_stage" value="PFE"
                                                class="form-check-input">
                                            <label for="PFE" class="form-check-label">Projet de fin d'études</label>
                                        </div>
                                        <div class="form-check">
                                            <label for="autre" class="form-check-label">Autre</label>
                                            <input type="text" id="autre" name="type_stage">
                                        </div>
                                    </div>
                                    <div class="stage" style="margin-left: 40px">
                                        <label class="toLeft form-title">Durée :</label>
                                        <div class="form-check">
                                            <input type="radio" id="Mois_1" name="duree" value="Mois_1"
                                                class="form-check-input">
                                            <label for="duree_1" class="form-check-label">1 Mois</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" id="2_mois" name="duree" value="2_mois"
                                                class="form-check-input">
                                            <label for="duree_1" class="form-check-label">2 Mois</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" id="3_mois" name="duree" value="3_mois"
                                                class="form-check-input">
                                            <label for="duree_1" class="form-check-label">3 Mois</label>
                                        </div>
                                        <div class="form-check">
                                            <label for="autre" class="form-check-label">Autre</label>
                                            <input type="text" id="autre" name="duree">
                                        </div>
                                    </div>
                                    <div class="w-100">
                                        <label for="date_debut" class="toLeft form-title">Date de début :</label>
                                        <center>
                                            <input type="date" id="date_debut" name="date_debut" class="form-control"
                                                style="width: 85%;">
                                        </center>
                                    </div>
                                    <div class="w-100">
                                        <label for="date_fin" class="toLeft form-title">Date de fin :</label>
                                        <center>
                                            <input type="date" id="date_fin" name="date_fin" class="form-control"
                                                style="width: 85%;">
                                        </center>
                                    </div>
                                    <div class="w-100">
                                        <label for="cv" class="toLeft form-title">CV :</label>
                                        <center>
                                            <input type="file" id="cv" name="cv" accept=".pdf,.doc,.docx"
                                                class="form-control" style="width: 85%;">
                                        </center>
                                    </div>
                                </div>
                                <div class="etape2 etape3 form-group" id="formationInputs">
                                    <label class="form-title">Sélectionnez la formation souhaitée:</label>

                                    <select name="profiles" id="profiles" class="type type2 form-control"
                                        aria-placeholder="choose a form">
                                        <option value="" disabled selected hidden>Choose</option>
                                        @foreach ($formation as $course)
                                            <option value="{{ $course->id }}">{{ $course->formation_name }}</option>
                                        @endforeach
                                    </select>
                                    <br>
                                    <div class="checkboxes">

                                        <label class="form-title">Comment vous nous avez trouvé </label>
                                        {{-- --}}
                                        <div>
                                            <label><input type="checkbox" name="competence_options[]"
                                                    value="Facebook">Facebook </label>
                                            <br>
                                            <label><input type="checkbox" name="competence_options[]"
                                                    value="LinkedIn">LinkedIn</label>
                                            <br>
                                            <label><input type="checkbox" name="competence_options[]"
                                                    value="WhatsApp">WhatsApp</label>
                                            <br>
                                            <label><input type="checkbox" name="competence_options[]"
                                                    value="Autre">Autre</label>
                                            <br>
                                        </div>
                                    </div>
                                </div>
                                <div class="etape2 etape3 type2 form-group" id="avecPaiementInputs"
                                    style="display: flex;">
                                    <div class="paiment">
                                        <label for="cin" class="toLeft form-title">CIN/PassPort :</label>
                                        <input type="text" id="cin" name="cin" class="form-control">
                                    </div>
                                    <div class="paiment">
                                        <label for="photo" class="toLeft form-title">Photo récente :</label>
                                        <input type="file" id="photo" name="photo"
                                            accept="image/jpeg, image/png, .jpg, .png" class="form-control">
                                    </div>
                                    <div class="paiment">
                                        <label for="face1" class="toLeft form-title">Photo CIN/Passport Face 1
                                            :</label>
                                        <input type="file" id="face1" name="face1"
                                            accept="image/jpeg, image/png, .jpg, .png" class="form-control">
                                    </div>
                                    <div class="paiment">
                                        <label for="face2" class="toLeft form-title">Photo CIN/Passport Face 2
                                            :</label>
                                        <input type="file" id="face2" name="face2"
                                            accept="image/jpeg, image/png, .jpg, .png" class="form-control">
                                    </div>
                                    <div class="paiment">
                                        <label for="cv" class="toLeft form-title">CV :</label>
                                        <input type="file" id="cv" name="cv" accept=".pdf,.doc,.docx"
                                            class="form-control">
                                    </div>
                                    <div class="paiment">
                                        <label for="recu" class="toLeft form-title">Une copie du reçu de paiement pour
                                            le montant du compte suivant :
                                            <br>
                                            (RIB) provenant de l'intérieur du Maroc,(IBAN) provenant de l'extérieur.
                                            <br>
                                            Photo/Reçu /virement/Versement Compte :
                                            <br>
                                            RIB au Maroc
                                            <br>
                                            Iban à l ' extérieur
                                            <br>
                                            RIB : 011 780 0000152000009516 39
                                            <br>
                                            IBAN : MA64 0117 8000 0015 2000 0095 1639
                                        </label>
                                        <input type="file" id="reçu" name="recu" accept=".pdf,.doc,.docx"
                                            class="form-control">
                                    </div>

                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                                aria-labelledby="pills-contact-tab">
                                <div id="preinscriptionInputs2" class="etape2 etape3 form-group" style="display: flex;">
                                    <div>
                                        <label for="desire" class="form-title">Bienvenue dans notre association. Nous
                                            sommes tous ici pour apprendre et contribuer, mais principalement, qu'est-ce que
                                            vous désirez le plus ?:</label>
                                        <select id="desire" name="desire" class="type type2 form-control">
                                            <option value="Profiter_activités">Profiter des activités et des cours proposés
                                                par l'association, ainsi que de la participation active dans leur
                                                préparation.</option>
                                            <option value="participer_cours">Participer à la préparation et à la
                                                réalisation des activités et des cours - et bien sûr en tirer profit.
                                            </option>
                                        </select>
                                    </div>
                                    <div class="checkboxes">
                                        <label class="form-title">Veuillez indiquer les activités et les cours dont vous
                                            souhaitez bénéficier.</label>
                                        <div> {{--  --}}
                                            <label><input type="checkbox" name="activity_options[]"
                                                    value="fondamentaux">Fondamentaux de l'informatique et de la
                                                technologie.</label>
                                            <br>
                                            <label><input type="checkbox" name="activity_options[]" value="cours">Cours
                                                de programmation et de technologie de l'information. </label>
                                            <br>
                                            <label><input type="checkbox" name="activity_options[]"
                                                    value="ateliers_1">Ateliers de sensibilisation aux dangers d'Internet
                                                et des réseaux sociaux</label>
                                            <br>
                                            <label><input type="checkbox" name="activity_options[]"
                                                    value="ateliers_2">Ateliers sur comment tirer parti d'Internet et de la
                                                technologie - opportunités et potentialités</label>
                                            <br>
                                            <label><input type="checkbox" name="activity_options[]" value="tout">Tout
                                                ce qui précède</label>

                                            <label><input type="text" name="autreACT" placeholder="autre"
                                                    class="type2" style=" overflow:hidden; resize: both"></label>

                                        </div>
                                    </div>
                                    <div class="checkboxes">

                                        <label class="form-title">Sélectionnez au maximum trois compétences ou domaines
                                            d'expertise dans lesquels vous excellez et que vous pouvez contribuer à
                                            l'association. </label>
                                        <div>
                                            <label><input type="checkbox" name="competence_options[]"
                                                    value="competence1">Communication, relations publiques et
                                                marketing</label>
                                            <br>
                                            <label><input type="checkbox" name="competence_options[]"
                                                    value="competence2">Logistique et toutes les questions liées à la
                                                préparation logistique des activités et des cours</label>
                                            <br>
                                            <label><input type="checkbox" name="competence_options[]"
                                                    value="competence3">Programmation et développement informatique
                                                (création et gestion de sites web et d'applications, préparation d'annonces,
                                                etc.)</label>
                                            <br>
                                            <label><input type="checkbox" name="competence_options[]"
                                                    value="competence4">Dispensation de cours et participation à des
                                                activités et des conférences</label>

                                            <label><input type="text" name="competence_options[]" placeholder="autre"
                                                    class="type2" style=" overflow:hidden; resize: both"></label>

                                        </div>
                                    </div>
                                    <div>
                                        <label class="form-title">Préférez-vous les cours et les programmes en ligne à
                                            distance ou en présentiel?</label>

                                        <div class="form-check">
                                            <input type="radio" id="presentiel" name="courses" value="presentiel"
                                                class="form-check-input">
                                            <label for="presentiel" class="form-check-label">Les meilleures formations en
                                                présentiel.</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" id="adistance" name="courses" value="adistance"
                                                class="form-check-input">
                                            <label for="adistance" class="form-check-label">Les meilleures formations en
                                                ligne à distance.</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" id="lesDeux" name="courses" value="lesDeux"
                                                class="form-check-input">
                                            <label for="lesDeux" class="form-check-label">Je n'ai pas de problème, les
                                                deux styles conviennent.</label>
                                        </div>
                                    </div>
                                    <div>
                                        {{-- profiles --}}
                                        <label for="profiles" class="form-title">Selectionnz votre profile:</label>

                                        <select name="profiles" id="profiles" class="type type2 form-control"
                                            aria-placeholder="choose a form">
                                            <option value="" disabled selected hidden>Choose a form</option>
                                            @foreach ($profiles as $profile)
                                                <option value="{{ $profile->id }}">{{ $profile->lebele }}</option>
                                            @endforeach
                                        </select>
                                        <br>
                                    </div>
                                    <div>
                                        {{-- comités --}}
                                        <label for="comites" class="form-title">Dans quelles commissions vous voyez-vous
                                            prêt à être actif ?</label>

                                        <select name="comites" id="comites" class="type type2 form-control"
                                            aria-placeholder="choose a form">
                                            <option value="" disabled selected hidden>Choose a form</option>
                                            <option value="no_comite">Je ne souhaite pas rejoindre de comité</option>
                                            @foreach ($comites as $comite)
                                                <option value="{{ $comite->id }}">{{ $comite->comite_name }}</option>
                                            @endforeach
                                        </select>
                                        <br>
                                    </div>
                                    <div>
                                        <label for="specialites" class="form-title">Spécialités:</label>
                                        <select name="specialites" id="specialites" class="form-control">
                                        </select>
                                        <div class="form-group">
                                            <label for="remarque">Qu'est-ce que l'association peut vous ou nous apporter ?
                                                Veuillez donner vos commentaires et suggestions. </label>
                                            <textarea id="remarque" name="remarque" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <script>
                                        // JavaScript function to toggle the display of specialites based on comite selection
                                        document.getElementById('comites').addEventListener('change', function() {

                                            $.ajax({
                                                type: 'GET',
                                                url: '/get-specialites/' + this.value,
                                                success: function(data) {
                                                    $.each(data, function(i, item) {
                                                        $('#specialites').append($('<option>', {
                                                            value: item.id,
                                                            text: item.specialite_name
                                                        }));
                                                    });
                                                }
                                            });
                                            var selectedComite = this.value;
                                            var specialitesSelect = document.getElementById('specialites');
                                            var specialitesLabel = document.querySelector('label[for="specialites"]');

                                            // Clear previous options
                                            specialitesSelect.innerHTML = '';

                                            if (selectedComite === 'no_comite' || selectedComite === '') {
                                                specialitesSelect.style.display = 'none';
                                                specialitesLabel.style.display = 'none';
                                            } else {
                                                specialitesSelect.style.display = 'block';
                                                specialitesLabel.style.display = 'block';
                                            }
                                        });

                                        // Hide specialitesSelect and its label initially if the default value is selected
                                        var defaultComite = document.getElementById('comites').value;
                                        var specialitesSelect = document.getElementById('specialites');
                                        var specialitesLabel = document.querySelector('label[for="specialites"]');
                                        if (defaultComite === 'no_comite' || defaultComite === '') {
                                            specialitesSelect.style.display = 'none';
                                            specialitesLabel.style.display = 'none';
                                        }
                                    </script>
                                </div>
                            </div>
                            {{-- data-bs-target="#pills-profile" --}}
                            {{-- <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Etape 1</button> --}}
                            {{-- <button type="button" class="nav-link active" data-bs-target="#pills-profile" data-bs-toggle="pill" id="pills-home-tab">Next</button>
          <button type="button" class="nav-link active" data-bs-target="#pills-profile">Next</button> --}}
                            <center>
                                <ul id="pills-tab" role="tablist" style="list-style: none">
                                    <li role="presentation" id="etp1">
                                        <button id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home"
                                            type="button" role="tab" aria-controls="pills-home"
                                            aria-selected="true">Etape 1</button>
                                    </li>

                                    <li role="presentation">
                                        <button id="pills-profile-tab" onclick='toggleInputs()' data-bs-toggle="pill"
                                            data-bs-target="#pills-profile" type="button" role="tab"
                                            aria-controls="pills-profile" aria-selected="false">Next</button>
                                    </li>
                                    <li role="presentation">
                                        <button id="pills-contact-tab" data-bs-toggle="pill"
                                            data-bs-target="#pills-contact" type="button" role="tab"
                                            aria-controls="pills-contact" aria-selected="false">Submit</button>
                                    </li>
                                    <li role="presentation" id="etp4">
                                        <button id="pills-contact-tab2" data-bs-toggle="pill"
                                            data-bs-target="#pills-contact" type="submit" role="tab"
                                            aria-controls="pills-contact" aria-selected="false">Submit</button>
                                    </li>
                                </ul>

                                {{-- <button type="button" class="btn btn-primary" id="button" onclick="toggleInputs()"  >Next</button> --}}
                            </center>
                        </div>


                    </form>
                </center>
            </div>
            <script>
                const etp1 = document.getElementById('pills-home-tab')
                const etp2 = document.getElementById('pills-profile-tab')
                const etp3 = document.getElementById('pills-contact-tab')
                const etp4 = document.getElementById("pills-contact-tab2")
                const etp5 = document.getElementById('etp4')

                etp1.style.display = 'none';
                etp3.style.display = 'none';
                etp4.style.display = 'none';

                async function toggleInputs() {
                    const type = document.getElementById('type').value;
                    const stageInputs = document.getElementById('stageInputs');
                    const preinscriptionInputs = document.getElementById('preinscriptionInputs1');
                    const preinscriptionInputs2 = document.getElementById('preinscriptionInputs2');
                    const formationInputs = document.getElementById('formationInputs');
                    const avecPaiementInputs = document.getElementById('avecPaiementInputs');
                    const page1 = document.getElementById('pills-home');
                    const button = document.getElementById('button');

                    if (type === 'stage') {
                        stageInputs.classList.add("active")
                        page1.classList.remove("active")
                        etp2.style.display = 'none';
                        etp3.style.display = 'block';
                        etp3.setAttribute("type", "submit")
                        preinscriptionInputs2.style.display = "none"
                        formationInputs.style.display = "none"
                        avecPaiementInputs.style.display = "none"
                        preinscriptionInputs.style.display = "none"
                        etp3.textContent = "Submit"
                        etp3.onclick = () => {
                            Swal.fire(
                                'Good job!',
                                'You clicked the button!',
                                'success'
                            )
                        }
                    } else if (type === 'preinscription') {
                        preinscriptionInputs.classList.add("active")
                        page1.style.display = "none"
                        stageInputs.style.display = "none"
                        preinscriptionInputs2.style.display = "flex"
                        formationInputs.style.display = "none"
                        avecPaiementInputs.style.display = "none"
                        preinscriptionInputs.style.display = "flex"
                        etp2.style.display = 'none';
                        etp3.style.display = 'block';
                        etp3.textContent = "Next"
                        etp3.onclick = () => {
                            etp4.style.display = "block"
                            etp3.style.display = "none"
                            preinscriptionInputs.style.display = "none"
                            preinscriptionInputs2.style.display = "flex"
                            etp4.setAttribute("type", "submit")

                            etp4.onclick = () => {
                                Swal.fire(
                                    'Good job!',
                                    'You clicked the button!',
                                    'success'
                                )
                            }
                        }

                    } else if (type === 'formation') {
                        etp2.style.display = 'none';
                        etp3.style.display = 'block';
                        page1.classList.remove("active")
                        formationInputs.classList.add("active")
                        page1.style.display = "none"
                        stageInputs.style.display = "none"
                        preinscriptionInputs2.style.display = "none"
                        formationInputs.style.display = "flex"
                        avecPaiementInputs.style.display = "none"
                        preinscriptionInputs.style.display = "none"
                        etp3.setAttribute("type", "submit")
                        etp3.textContent = "Submit"
                        etp3.removeAttribute("data-bs-target")
                        etp3.textContent = "Submit"
                        etp3.onclick = () => {
                            Swal.fire(
                                'Good job!',
                                'You clicked the button!',
                                'success'
                            )
                        }

                    } else if (type === 'avecPaiment') {
                        document.getElementById('profiles').style.display = 'none';
                        etp2.style.display = 'none';
                        etp3.style.display = 'block';
                        page1.classList.remove("active")
                        page1.style.display = "none"
                        stageInputs.style.display = "none"
                        preinscriptionInputs2.style.display = "none"
                        formationInputs.style.display = "none"
                        avecPaiementInputs.style.display = "flex"
                        preinscriptionInputs.style.display = "none"
                        etp3.setAttribute("type", "submit")
                        etp3.textContent = "Submit"
                        etp3.removeAttribute("data-bs-target")
                        etp3.textContent = "Submit"
                        etp3.onclick = () => {
                            Swal.fire(
                                'Good job!',
                                'You clicked the button!',
                                'success'
                            )
                        }
                    } else {

                    }
                }

                function validateForm() {
                    const type = document.getElementById('type').value;
                    const nomInput = document.getElementById('nom');
                    const errorMessage = document.getElementById('type-error-message');

                    if (nomInput.value !== '' && type === '') {
                        errorMessage.style.display = 'block';
                        return false; // Prevent form submission
                    } else {
                        errorMessage.style.display = 'none';
                        return true; // Allow form submission
                    }
                }
                const password = document.getElementById('password')
                password.addEventListener('input', () => {
                    if (password.value.length < 8) {
                        password.style.border = "2px solid red"
                    } else {
                        password.style.border = "2px solid green"
                    }
                })
                const email = document.getElementById('email')
                let regexp = /^[\w-\.]+@([\w-]+\.)+[\w-]{1,6}$/g
                email.addEventListener('input', () => {
                    if (!regexp.test(email.value)) {
                        email.style.border = "2px solid red"
                    } else {
                        email.style.border = "2px solid green"
                    }
                })
            </script>
        </section>

        <!-- End About Section -->
    </main><!-- End #main -->
@endsection
