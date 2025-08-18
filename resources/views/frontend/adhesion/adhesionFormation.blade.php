@extends('frontend.layouts.app')
@section('title')
    <title>Adhésion |Formation</title>
@endsection
@section('content')
    <style>
        body {
            background-color: #ffffff;
            color: #444444;
            font-family: 'Roboto', sans-serif;
            font-size: 16px;
            font-weight: 300;
            margin: 0;
            padding: 0;
        }

        /* Container centering and width control */
        .wizard-section {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .parallax {
            background-image: url(../frontend/img/hero1.jpg);
            background-repeat: no-repeat;
            background-size: cover;
            opacity: inherit;
        }

        .breadcrumbs {
            background: rgba(0, 0, 0, 0.4) url(../frontend/img/pattern.png) repeat;
            padding: 91px 0;
        }

        .breadcrumbs h2 {
            color: white;
            text-align: center;
            margin: 0;
            font-size: 50px;
        }

        .form-wizard {
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }

        .form-wizard .wizard-form-radio {
            display: inline-block;
            margin-right: 15px;
            position: relative;
        }

        .form-wizard .wizard-form-radio input[type="radio"] {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            background-color: #dddddd;
            height: 25px;
            width: 25px;
            display: inline-block;
            vertical-align: middle;
            border-radius: 50%;
            position: relative;
            cursor: pointer;
            margin-right: 5px;
        }

        .form-wizard .wizard-form-radio input[type="radio"]:focus {
            outline: 0;
        }

        .form-wizard .wizard-form-radio input[type="radio"]:checked {
            background-color: #0080C9;
        }

        .form-wizard .wizard-form-radio input[type="radio"]:checked::before {
            content: "";
            position: absolute;
            width: 10px;
            height: 10px;
            display: inline-block;
            background-color: #ffffff;
            border-radius: 50%;
            left: 7px;
            top: 7px;
        }

        .form-wizard-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .form-wizard-header p {
            color: #666;
            margin-bottom: 30px;
        }

        .form-wizard-steps {
            margin: 0 0 40px 0;
            padding: 0;
            list-style: none;
            display: flex;
            justify-content: space-between;
        }

        .form-wizard-steps li {
            width: 25%;
            position: relative;
            text-align: center;
        }

        .form-wizard-steps li::after {
            background-color: #f3f3f3;
            content: "";
            height: 3px;
            left: 50%;
            position: absolute;
            top: 18px;
            width: 23vw;
            z-index: 0;
        }

        .form-wizard-steps li:last-child::after {
            display: none;
        }

        .form-wizard-steps li span {
            background-color: #dddddd;
            border-radius: 50%;
            display: inline-block;
            height: 40px;
            line-height: 40px;
            position: relative;
            text-align: center;
            width: 40px;
            z-index: 1;
            color: #fff;
            transition: all 0.3s ease;
        }

        .form-wizard-steps li.active span,
        .form-wizard-steps li.activated span {
            background-color: #0080C9;
            color: #ffffff;
        }

        .form-wizard-steps li.activated::after {
            background-color: #0080C9;
        }

        .wizard-fieldset {
            display: none;
            padding: 20px 0;
        }

        .wizard-fieldset.show {
            display: block;
        }

        .form-wizard .form-group {
            position: relative;
            margin: 25px 0;
        }

        .form-wizard .form-control {
            height: auto;
            padding: 15px;
            border: 1px solid #e4e4e4;
            background-color: #f8f9fa;
            border-radius: 4px;
            width: 37vw;
            box-sizing: border-box;
            transition: all 0.3s ease;
        }

        .form-wizard .form-control:focus {
            border-color: #0080C9;
            box-shadow: 0 0 0 2px rgba(0, 128, 201, 0.1);
            outline: 0;
        }

        .wizard-form-text-label {
            position: absolute;
            left: 15px;
            top: 15px;
            transition: 0.2s ease all;
            color: #666;
            pointer-events: none;
        }

        .focus-input .wizard-form-text-label {
            top: -18px;
            left: 0;
            font-size: 12px;
            color: #0080C9;
            background: #fff;
            padding: 0 5px;
        }

        .wizard-form-error {
            display: none;
            position: absolute;
            left: 0;
            right: 0;
            bottom: -20px;
            height: 2px;
            background: #ff6b6b;
        }

        .form-wizard-next-btn,
        .form-wizard-previous-btn,
        .form-wizard-submit {
            background-color: #0080C9;
            color: #ffffff;
            display: inline-block;
            min-width: 120px;
            padding: 12px 24px;
            text-align: center;
            border-radius: 4px;
            text-decoration: none;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .form-wizard-next-btn:hover,
        .form-wizard-previous-btn:hover,
        .form-wizard-submit:hover {
            background-color: #006ba8;
        }

        .form-wizard-previous-btn {
            background-color: #6c757d;
        }

        .form-wizard-previous-btn:hover {
            background-color: #5a6268;
        }

        select.form-control {
            appearance: none;
            -webkit-appearance: none;
            padding-right: 30px;
            background-repeat: no-repeat;
            background-position: right 10px center;
            background-size: 16px;
        }

        /* Mobile devices: 320px — 480px */
        @media screen and (max-width: 480px) {
            .wizard-section {
                padding: 10px;
            }

            .form-wizard-steps li span {
                height: 25px;
                width: 25px;
                line-height: 25px;
                font-size: 10px;
            }

            .form-wizard .form-control {
                font-size: 14px;
                width: 79vw !important;
            }

            .form-wizard-header {
                text-align: left;
            }
        }

        /* iPads, Tablets: 481px — 768px */
        @media screen and (min-width: 481px) and (max-width: 768px) {
            .form-wizard .form-control {
                font-size: 14px;
                width: 82vw !important;
            }

            .form-wizard-header {
                text-align: left;
            }
        }

        /* Small screens, laptops: 769px — 1024px */
        @media screen and (min-width: 768px) and (max-width: 1024px) {
            .form-wizard {
                padding: 10px;
            }

            .form-wizard-steps li span {
                height: 30px;
                width: 30px;
                line-height: 30px;
                font-size: 12px;
            }

            .form-wizard .form-control {
                font-size: 14px;
                width: 72vw !important;
            }
        }

        /* Desktops, large screens: 1025px — 1200px */
        @media screen and (min-width: 1025px) and (max-width: 1200px) {
            .form-wizard {
                padding: 10px;
            }

            .form-wizard-steps li span {
                height: 30px;
                width: 30px;
                line-height: 30px;
                font-size: 12px;
            }

            .form-wizard .form-control {
                font-size: 14px;
                width: 71vw !important;
            }
        }

        /* Extra large screens, TV: 1201px and more */
        @media screen and (min-width: 1201px) {
            .form-wizard {
                padding: 20px;
            }

            .form-wizard-steps li span {
                height: 35px;
                width: 35px;
                line-height: 35px;
                font-size: 14px;
            }

            .form-wizard .form-control {
                font-size: 16px;
                width: 47vw !important;
            }
        }


        .imag {
            width: 56%;
            margin-bottom: 20px
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
    </style>
    <main id="main">
        <!-- ======= Breadcrumbs ======= -->
        <div class="parallax">
            <div class="breadcrumbs" data-aos="fade-in">
                <div class="container">
                    <h2>Inscription pour les formations</h2>
                    <p>Vous pouvez facilement trouver les outils qui vous conviennent. </p>
                </div>
            </div><!-- End Breadcrumbs -->
        </div>

        <!-- ======= About Section ======= -->
        <section id="about" class="wizard-section">
            <div class="row no-gutters">
                <div class="col-lg-12 col-md-12 col-xs-12">
                    <div class="form-wizard">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        <center><img src="{{ asset('frontend/img/logo-amdd.png') }}" alt="" class="imag"></center>
                        <form action="{{ route('save_formation') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-wizard-header">
                                <ul class="list-unstyled form-wizard-steps clearfix">
                                    <li class="active"><span>1</span></li>
                                    <li><span>2</span></li>
                                </ul>
                            </div>
                            <fieldset class="wizard-fieldset show">
                                <h5>Information personnel</h5>
                                <div class="form-group">
                                    <input type="text" class="form-control wizard-required" id="fname"
                                        name="fname">
                                    <label for="fname" class="wizard-form-text-label">Nom: *</label>
                                    <div class="wizard-form-error"></div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control wizard-required" id="lname"
                                        name="lname">
                                    <label for="lname" class="wizard-form-text-label">Prenom :*</label>
                                    <div class="wizard-form-error"></div>
                                </div>
                                <div class="form-group">
                                    Sexe
                                    <div class="wizard-form-radio">
                                        <input name="genre" id="radio1" type="radio" value="Masculin">
                                        <label for="radio1">Masculin</label>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                    <div class="wizard-form-radio">
                                        <input name="genre" id="radio2" type="radio" value="Féminin">
                                        <label for="radio2">Féminin</label>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="number" class="form-control wizard-required" id="tele"
                                        name="tele">
                                    <label for="tele" class="wizard-form-text-label">Téléphone :*</label>
                                    <div class="wizard-form-error"></div>
                                </div>
                                <div class="form-group">
                                    <select id="regionSelect" class="form-control wizard-required" name="region">
                                        <option value="" disabled selected>Sélectionnez une région</option>
                                        <option value="Tanger-Tétouan-Al Hoceïma">Tanger-Tétouan-Al Hoceïma</option>
                                        <option value="l'Oriental">l'Oriental</option>
                                        <option value="Fès-Meknès">Fès-Meknès</option>
                                        <option value="Rabat-Salé-Kénitra">Rabat-Salé-Kénitra</option>
                                        <option value="Béni Mellal-Khénifra">Béni Mellal-Khénifra</option>
                                        <option value="Casablanca-Settat">Casablanca-Settat</option>
                                        <option value="Marrakech-Safi">Marrakech-Safi</option>
                                        <option value="Drâa-Tafilalet">Drâa-Tafilalet</option>
                                        <option value="Souss-Massa">Souss-Massa</option>
                                        <option value="Guelmim-Oued Noun">Guelmim-Oued Noun</option>
                                        <option value="Laâyoune-Sakia El Hamra">Laâyoune-Sakia El Hamra</option>
                                        <option value="Dakhla-Oued Ed Dahab">Dakhla-Oued Ed Dahab</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select id="citySelect" class="form-control wizard-required" name="city">
                                        <option value="" disabled selected>Sélectionnez une ville</option>
                                    </select>
                                </div>
                                <div class="form-group clearfix">
                                    <a href="javascript:;" class="form-wizard-next-btn float-right">Suivant</a>
                                </div>
                            </fieldset>
                            <fieldset class="wizard-fieldset">
                                <h5>Formation</h5>
                                <div class="form-group">
                                    <select name="formation_souhaitable" id="formation_souhaitable"
                                        class="form-control wizard-required">
                                        <option value="" selected disabled>Sélectionnez la formation souhaitée:
                                        </option>
                                        <option value="Algorithmique et Initiation aux programmation C">Algorithmique et
                                            Initiation aux programmation C</option>
                                        <option value="Initiation au Base de données">Initiation au Base de données</option>
                                        <option value="Création de siteweb Statique">Création de siteweb Statique</option>
                                        <option value="Méthodologie PFA">Méthodologie PFA</option>
                                    </select>
                                    <div class="wizard-form-error"></div>
                                </div>
                                <div class="checkboxes">
                                    <label class="form-title">Comment vous nous avez trouvé.</label>
                                    <div>
                                        <label><input type="checkbox" name="reseau_sociaux[]"
                                                value="Facebook">Facebook.</label>
                                        <br>
                                        <label><input type="checkbox" name="reseau_sociaux[]" value="Linkedin">Linkedin. </label>
                                        <br>
                                        <label><input type="checkbox" name="reseau_sociaux[]"
                                                value="WhatsApp">WhatsApp</label>
                                        <br>
                                        <label><input type="text" name="autre" placeholder="autre" class="type2"
                                                style=" overflow:hidden; resize: both"></label>
                                    </div>
                                </div>
                                <div class="form-group clearfix">
                                    <a href="javascript:;" class="form-wizard-previous-btn float-left">Previous</a>
                                    <button type="submit" class="form-wizard-submit float-right">Adhéré</button>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </section><!-- End About Section -->
        <script>
            var lookup = {
                "Tanger-Tétouan-Al Hoceïma": [
                    'Ajdir‎',
                    'Akchour',
                    'Aknoul‎',
                    'Al Hoceïma‎',
                    'Assilah',
                    'Aïn Dorij',
                    'Aït Hichem‎',
                    'Bab Berred',
                    'Bab Taza',
                    'Bni Bouayach‎',
                    'Bni Hadifa‎',
                    'Brikcha',
                    'Chefchaouen',
                    'Dar Bni Karrich',
                    'Dar Chaoui',
                    'Fnideq',
                    'Imzouren‎',
                    'Inahnahen‎',
                    'Issaguen (Ketama)‎',
                    'Khémis Sahel',
                    'Ksar El Kébir',
                    'Larache',
                    'Mdiq',
                    'Martil',
                    'Moqrisset',
                    'Ouazzane',
                    'Oued Laou',
                    'Oued Rmel',
                    'Point Cires',
                    'Sidi Lyamani',
                    'Sidi Mohamed ben Abdallah el-Raisuni',
                    'Stehat',
                    'Taghzout',
                    'Tala Tazegwaght‎',
                    'Tamassint‎',
                    'Tanger‎',
                    'Taounate‎',
                    'Tarfaya‎',
                    'Targuist‎',
                    'Taza‎',
                    'Taïnaste‎',
                    'Tétouan‎',
                    'Zinat',
                ],
                "l'Oriental": [
                    "Aghbal",
                    "Ahfir",
                    "Aïn Beni Mathar",
                    'Aïn Chaïr',
                    'Ain Chouater',
                    'Aïn Reggada',
                    'Aït Chiker',
                    'Aklim',
                    'Al Aroui',
                    'Ben Taïeb',
                    'Beni Ensar',
                    'Beni Tadjit',
                    'Berkane',
                    'Bni Drar',
                    'Bouanane',
                    'Bouarfa',
                    'Bouarg',
                    'Bouhdila',
                    'Dar El Kebdani',
                    'Douar Kannine',
                    'Driouch',
                    'Farkhana',
                    'Figuig',
                    'Ihddaden',
                    'Jaâdar',
                    'Jerada',
                    'Kariat Arekmane',
                    'Kassita',
                    'Kerouna',
                    'Laâtamna',
                    'Madagh',
                    'Midar',
                    'Nador',
                    'Naïma',
                    'Oued Heimer',
                    'Oujda',
                    'Saïdia',
                    'Selouane',
                    'Sidi Boubker',
                    'Sidi Lahsen',
                    'Sidi Slimane Echcharaa',
                    'Talsint',
                    'Taourirt',
                    'Tendrara',
                    'Tiztoutine',
                    'Touima',
                    'Touissit',
                    'Zaïo',
                    'Zeghanghane',
                ],
                "Fès-Meknès": [
                    "Agourai",
                    "Ain Taoujdate",
                    "Aknoul‎",
                    "Azrou",
                    "Aïn Jemaa",
                    "Aïn Karma ",
                    "Aïn Leuh",
                    "Aït Boubidmane",
                    "Bhalil",
                    "Boufakrane",
                    "Boulemane",
                    "El Hajeb",
                    "El Menzel",
                    "Fès",
                    "Ghafsai‎",
                    "Guigou",
                    "Haj Kaddour",
                    "Ifrane",
                    "Imouzzer Kandar",
                    "Imouzzer Marmoucha",
                    "Karia",
                    "Karia Ba Mohamed‎",
                    "M'haya",
                    "Meknès‎",
                    "Missour",
                    "Moulay Idriss Zerhoun",
                    "Moulay Yaâcoub",
                    "Moussaoua",
                    "N'Zalat Bni Amar",
                    "Oued Amlil‎",
                    "Oued Ifrane",
                    "Oulad Zbair‎",
                    "Ouled Tayeb",
                    "Outat El Haj",
                    "Ribate El Kheir",
                    "Ribate El Kheir",
                    "Sabaa Aiyoun",
                    "Sebt Jahjouh",
                    "Sidi Addi",
                    "Skhinate",
                    "Séfrou",
                    "Tahla",
                    "Taounate‎",
                    "Taza‎",
                    "Taïnaste‎",
                    "Thar Es-Souk‎",
                    "Timahdite",
                    "Tissa‎",
                    "Tizguite",
                    "Tizi Ouasli‎",
                    "Toulal",
                    "Zaouia d'Ifrane",
                ],
                "Rabat-Salé-Kénitra": [
                    "Ain El Aouda",
                    "Arbaoua",
                    "Dar Gueddari",
                    "Had Kourt",
                    "Harhoura",
                    "Jorf El Melha",
                    "Khenichet",
                    "Khémisset",
                    "Kénitra",
                    "Lalla Mimouna",
                    "Mechra Bel Ksiri",
                    "Mehdia",
                    "Moulay Bousselham",
                    "Oulmès",
                    "Rabat",
                    "Rommani",
                    "Salé",
                    "Sidi Allal El Bahraoui",
                    "Sidi Allal Tazi",
                    "Sidi Bouknadel",
                    "Sidi Slimane",
                    "Sidi Taibi",
                    "Sidi Yahya El Gharb",
                    "Skhirate",
                    "Souk El Arbaa",
                    "Tamesna",
                    "Tiddas",
                    "Tiflet",
                    "Touarga",
                    "Témara",
                ],
                "Béni Mellal-Khénifra": [
                    "Afourar",
                    "Aghbala",
                    "Amalou Ighriben",
                    "Azilal",
                    "Aït Attab",
                    "Aït Ishaq",
                    "Aït Majden",
                    "Bejaâd",
                    "Beni Ayat",
                    "Bin elouidane",
                    "Boujniba",
                    "Boulanouare",
                    "Bradia",
                    "Bzou",
                    "Béni Mellal",
                    "Dar Oulad Zidouh",
                    "Demnate",
                    "El Ksiba",
                    "Elkbab",
                    "Er-Rich",
                    "Foum Jamaa",
                    "Fquih Ben Salah",
                    "Had Bouhssoussen",
                    "Hattane",
                    "Kasba Tadla",
                    "Kehf Nsour",
                    "Kerrouchen",
                    "Khouribga",
                    "Khénifra",
                    "M'rirt",
                    "Moulay Bouazza",
                    "Ouaouizeght",
                    "Ouaoumana",
                    "Oued Zem",
                    "Oulad Ayad",
                    "Oulad M'Barek",
                    "Oulad Yaich",
                    "Sidi Jaber",
                    "Souk Sebt Oulad Nemma",
                    "Tighassaline",
                    "Tighza",
                    "Zaouïat Cheikh",
                ],
                "Casablanca-Settat": [
                    "Azemmour",
                    "Aïn Harrouda",
                    "Ben Ahmed",
                    "Aïn Harrouda",
                    "Beni Yakhlef",
                    "Benslimane",
                    "Berrechid",
                    "Bir Jdid",
                    "Bouskoura",
                    "Bouznika",
                    "Casablanca",
                    "Deroua",
                    "El Borouj",
                    "El Gara",
                    "El Jadida",
                    "Guisser",
                    "Jorf Lasfar",
                    "Karia (El Jadida)",
                    "Khemis Zemamra",
                    "Laaounate",
                    "Loulad",
                    "Mohammadia",
                    "Moulay Abdallah Amghar",
                    "Médiouna",
                    "Oualidia",
                    "Oulad Abbou",
                    "Oulad Amrane",
                    "Oulad Frej",
                    "Oulad Ghadbane",
                    "Oulad H'Riz Sahel",
                    "Oulad M'rah",
                    "Oulad Saïd",
                    "Oulad Sidi Ben",
                    "Ras El Aïn",
                    "Sebt El Maârif",
                    "Settat",
                    "Sidi Ali Ban Hamdouche",
                    "Sidi Bennour",
                    "Sidi Bouzid",
                    "Sidi Rahhal Chataï",
                    "Sidi Smaïl",
                    "Soualem",
                    "Tit Mellil",
                ],
                "Marrakech-Safi": [
                    "Ait Daoud",
                    "Amizmiz",
                    "Assahrij",
                    "Aït Ourir",
                    "Aebi'a Tighadwiyn",
                    "Ben Guerir",
                    "Bouguedra",
                    "Chichaoua",
                    "DAr Jamaa",
                    "Echemmaia",
                    "El Hanchane",
                    "El Kelaâ des Sraghna",
                    "Essaouira",
                    "Fraïta",
                    "Ghmate",
                    "Hrara",
                    "Had Draa",
                    "Harbile",
                    "Ighoud",
                    "Imintanoute",
                    "Jamâat Shaim",
                    "Kattara",
                    "Lalla Takerkoust",
                    "Laakarta",
                    "Loudaya",
                    "Lâattaouia",
                    "Marrakech",
                    "Moulay Brahim",
                    "Mzouda",
                    "Mzem Senhaja",
                    "Ounagha",
                    "Safi",
                    "Sebt Gzoula",
                    "Sid L'Mokhtar",
                    "Sid Zouin",
                    "Sidi Abdallah Ghiat",
                    "Sidi Ahmed",
                    "Sidi Bou Othmane",
                    "Sidi Rahal",
                    "Skhour Rehamna",
                    "Smimou",
                    "Tafetachte",
                    "Tahannaout",
                    "Talmest",
                    "Tamallalt",
                    "Tamanar",
                    "Tamansourt",
                    "Tameslouht",
                    "Youssoufia",
                    "Zerkten",
                ],
                "Drâa-Tafilalet": [
                    "Agdz",
                    "Alnif",
                    "Aoufous",
                    "Arfoud",
                    "Aït Yalla",
                    "Boudnib",
                    "Boumalne-Dadès",
                    "Boumia",
                    "Dra'a",
                    "Errachidia",
                    "Gardmit",
                    "Goulmima",
                    "Gourrama",
                    "Harte Lyamine",
                    "Ifri",
                    "Ighil n'Oumgoun",
                    "Ighounane",
                    "Imassine",
                    "Itzer",
                    "Jorf",
                    "Kelaat-M'Gouna",
                    "M'semrir",
                    "Midelt",
                    "Moulay Ali Cherif",
                    "MyAliCherif",
                    "Ouarzazate",
                    "Rissani",
                    "Sarghine",
                    "Skoura",
                    "Tabounte",
                    "Tamegroute",
                    "Tanoumrite Nkob Zagora",
                    "Taourirt ait zaghar",
                    "Tichoute",
                    "Tinejdad",
                    "Toundoute",
                    "Tounfite",
                    "Zagora",
                    "Zaïda",
                ],
                "Souss-Massa": [
                    "Agni Izimmer",
                    "Agadir",
                    "Akka",
                    "Anzi",
                    "Aoulouz",
                    "Aourir",
                    "Arazane",
                    "Aït Baha",
                    "Aït Iaâza",
                    "Aït Melloul",
                    "Ben Sergao",
                    "Biougra",
                    "Dcheira El Jihadia",
                    "Drargua",
                    "El Guerdane",
                    "Fam El Hisn",
                    "Foum Zguid",
                    "Ida Ougnidif",
                    "Igdamen",
                    "Inezgane",
                    "Irherm",
                    "Lakhsas",
                    "Lqliâa",
                    "Massa",
                    "Megousse",
                    "Oulad Berhil",
                    "Tafraout",
                    "Tagzen",
                    "Taliouine",
                    "Tamraght",
                    "Tanalt",
                    "Taroudannt",
                    "Tata",
                    "Temsia",
                    "Tifnit",
                    "Tisgdal",
                    "Tiznit",
                ],
                "Guelmim-Oued Noun": [
                    "Assa",
                    "Bouizakarne",
                    "El Ouatia",
                    "Guelmim",
                    "Sidi Ifni",
                    "Taghjijt",
                    "Tan-Tan",
                    "Zag",
                ],
                "Laâyoune-Sakia El Hamra": [
                    "Boujdour‎",
                    "El Marsa‎",
                    "Es-Semara",
                    "Laayoune‎",
                    "Tarfaya‎",
                ],
                "Dakhla-Oued Ed Dahab": [
                    "Awsard",
                    "Oued-Eddahab",
                ],
            };

            // When an option is changed, search the above for matching choices
            $('#regionSelect').on('change', function() {
                // Set selected option as variable
                var selectValue = $(this).val();

                // Empty the target field
                $('#citySelect').empty();

                // For each chocie in the selected option
                for (i = 0; i < lookup[selectValue].length; i++) {
                    // Output choice in the target field
                    $('#citySelect').append("<option value='" + lookup[selectValue][i] + "'>" + lookup[selectValue][i] +
                        "</option>");
                }
            });
        </script>
        <script>
            jQuery(document).ready(function() {
                // click on next button
                jQuery(".form-wizard-next-btn").click(function() {
                    var parentFieldset = jQuery(this).parents(".wizard-fieldset");
                    var currentActiveStep = jQuery(this)
                        .parents(".form-wizard")
                        .find(".form-wizard-steps .active");
                    var next = jQuery(this);
                    var nextWizardStep = true;
                    parentFieldset.find(".wizard-required").each(function() {
                        var thisValue = jQuery(this).val();

                        if (thisValue == "") {
                            jQuery(this).siblings(".wizard-form-error").slideDown();
                            nextWizardStep = false;
                        } else {
                            jQuery(this).siblings(".wizard-form-error").slideUp();
                        }
                    });
                    if (nextWizardStep) {
                        next.parents(".wizard-fieldset").removeClass("show", "400");
                        currentActiveStep
                            .removeClass("active")
                            .addClass("activated")
                            .next()
                            .addClass("active", "400");
                        next
                            .parents(".wizard-fieldset")
                            .next(".wizard-fieldset")
                            .addClass("show", "400");
                        jQuery(document)
                            .find(".wizard-fieldset")
                            .each(function() {
                                if (jQuery(this).hasClass("show")) {
                                    var formAtrr = jQuery(this).attr("data-tab-content");
                                    jQuery(document)
                                        .find(".form-wizard-steps .form-wizard-step-item")
                                        .each(function() {
                                            if (jQuery(this).attr("data-attr") == formAtrr) {
                                                jQuery(this).addClass("active");
                                                var innerWidth = jQuery(this).innerWidth();
                                                var position = jQuery(this).position();
                                                jQuery(document)
                                                    .find(".form-wizard-step-move")
                                                    .css({
                                                        left: position.left,
                                                        width: innerWidth
                                                    });
                                            } else {
                                                jQuery(this).removeClass("active");
                                            }
                                        });
                                }
                            });
                    }
                });
                //click on previous button
                jQuery(".form-wizard-previous-btn").click(function() {
                    var counter = parseInt(jQuery(".wizard-counter").text());
                    var prev = jQuery(this);
                    var currentActiveStep = jQuery(this)
                        .parents(".form-wizard")
                        .find(".form-wizard-steps .active");
                    prev.parents(".wizard-fieldset").removeClass("show", "400");
                    prev
                        .parents(".wizard-fieldset")
                        .prev(".wizard-fieldset")
                        .addClass("show", "400");
                    currentActiveStep
                        .removeClass("active")
                        .prev()
                        .removeClass("activated")
                        .addClass("active", "400");
                    jQuery(document)
                        .find(".wizard-fieldset")
                        .each(function() {
                            if (jQuery(this).hasClass("show")) {
                                var formAtrr = jQuery(this).attr("data-tab-content");
                                jQuery(document)
                                    .find(".form-wizard-steps .form-wizard-step-item")
                                    .each(function() {
                                        if (jQuery(this).attr("data-attr") == formAtrr) {
                                            jQuery(this).addClass("active");
                                            var innerWidth = jQuery(this).innerWidth();
                                            var position = jQuery(this).position();
                                            jQuery(document)
                                                .find(".form-wizard-step-move")
                                                .css({
                                                    left: position.left,
                                                    width: innerWidth
                                                });
                                        } else {
                                            jQuery(this).removeClass("active");
                                        }
                                    });
                            }
                        });
                });
                //click on form submit button
                jQuery(document).on("click", ".form-wizard .form-wizard-submit", function() {
                    var parentFieldset = jQuery(this).parents(".wizard-fieldset");
                    var currentActiveStep = jQuery(this)
                        .parents(".form-wizard")
                        .find(".form-wizard-steps .active");
                    parentFieldset.find(".wizard-required").each(function() {
                        var thisValue = jQuery(this).val();
                        if (thisValue == "") {
                            jQuery(this).siblings(".wizard-form-error").slideDown();
                        } else {
                            jQuery(this).siblings(".wizard-form-error").slideUp();
                        }
                    });
                });
                // focus on input field check empty or not
                jQuery(".form-control")
                    .on("focus", function() {
                        var tmpThis = jQuery(this).val();
                        if (tmpThis == "") {
                            jQuery(this).parent().addClass("focus-input");
                        } else if (tmpThis != "") {
                            jQuery(this).parent().addClass("focus-input");
                        }
                    })
                    .on("blur", function() {
                        var tmpThis = jQuery(this).val();
                        if (tmpThis == "") {
                            jQuery(this).parent().removeClass("focus-input");
                            jQuery(this).siblings(".wizard-form-error").slideDown("3000");
                        } else if (tmpThis != "") {
                            jQuery(this).parent().addClass("focus-input");
                            jQuery(this).siblings(".wizard-form-error").slideUp("3000");
                        }
                    });
            });
        </script>
    </main><!-- End #main -->
@endsection
