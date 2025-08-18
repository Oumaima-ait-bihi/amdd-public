@extends('frontend.layouts.app')
@section('title')
    <title>Présentation |AMDD</title>
@endsection
@section('content')
    <main id="main">
        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs" data-aos="fade-in">
            <div class="container">
                <h2>Présentation à propos</h2>
                <p>AMDD est une Association Marocaine de Développement Digital basée sur Casablanca, son activité principale
                    est l’accompagnement et l’encadrement des gens particuliers et des stagiaires dans le domaine digital
                    aussi de valoriser le domaine digital dans la société marocaine</p>
            </div>
        </div><!-- End Breadcrumbs -->

        <!-- ======= planning ======= -->
        <section id="planning" class="about">
            <div class="container">

                <div class="row">
                    <div class="section-title">
                        <p>planning</p>
                    </div>
                    <div class="col-lg-12 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
                        <div class="style-table col-lg-12 mt-5 mt-lg-0 ">

                            <table>
                                <tr>
                                    <td colspan="9" id="pro">Progrmamme simplifié AMDD</td>
                                </tr>
                                @for ($i = 1; $i <= $count; $i++)
                                    <tr>
                                    <tr>
                                        @if ($i == 1)
                                            <td rowspan='{{ 6 * $count }}' style="border-bottom:none;">ANNEE 2022</td>
                                            <td rowspan="{{ 6 * $count }}">Mois 1</td>
                                        @endif
                                        <td rowspan="6">S{{ $i }}</td>
                                        <td rowspan="4">Formation</td>
                                        <td>Thème</td>
                                        <td rowspan="4" colspan="4">vide</td>
                                    </tr>
                                    <tr>
                                        <td>Localisation</td>
                                    </tr>
                                    <tr>
                                        <td>Organisateurs</td>
                                    </tr>
                                    <tr>
                                        <td>Date et heure</td>
                                    </tr>
                                    <tr>
                                        <td rowspan="2">Tâche</td>
                                        <td colspan="5" rowspan="2">vide</td>
                                    </tr>
                                    </tr>
                                @endfor
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section> <!-- End planing -->
        <!-- ======= organigramme ======= -->
        <section id="organigramme" class="about">
            <div class="container">
                <div class="row">
                    <div class="section-title">
                        <p>Organigramme Association</p>
                    </div>
                    <div class="d-flex justify-content-center align-items-center " style="height: 50vh;">
                        <div id="chartDiv"
                            style="width: 100vw;
              height: 28%;
              margin: 10px auto;
              overflow: unset;
              zoom: 0.9;">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="organigramme2" class="about">
            <div class="container" data-aos="fade-up">
                <div class="row">
                    <div class="section-title">
                        <p>Organigramme ComitéS</p>
                    </div>
                    <div class="d-flex justify-content-center align-items-center" style="height:fit-content; width:100%">

                        <div id="chartDiv2" style="width: 100%; height: 400px; margin: 0px auto; overflow: hidden">

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End organigramme -->
        <!-- ======= comite de l'association Section ======= -->
        <section id="comite" class="about">
            <div class="container" data-aos="fade-up">
                <div class="row">
                    <div class="section-title">
                        <p>Comité de l'association</p>
                    </div>
                    <div class="col-lg-6 pt-2 pt-lg-0 order-2 order-lg-1 content">
                        <ul class="committee-list">
                            <li class="committee-item">
                                <i class="bi bi-check-circle"></i>Comité Bureau Exécutif (CBE)

                            </li>
                            <li class="committee-item">
                                <i class="bi bi-check-circle"></i>Comité Conseil Core Exécutif (CCCE)

                            </li>
                            <li class="committee-item">
                                <i class="bi bi-check-circle"></i>Comité Communication et Marketing Digital (CCMD)
                            </li>
                            <li class="committee-item">
                                <i class="bi bi-check-circle"></i>Comité Développement Digital (CDD)

                            </li>
                            <li class="committee-item">
                                <i class="bi bi-check-circle"></i>Comité Formation Recherche et Innovation Digitale (CFRID)
                            </li>
                            <li class="committee-item">
                                <i class="bi bi-check-circle"></i>Comité Encadrement Digital (CED)

                            </li>
                            <li class="committee-item">
                                <i class="bi bi-check-circle"></i>Comité Conseil Juridiques Ressources Humaines &amp;
                                Relation Extérieur (CCJRHRE)

                            </li>
                            <li class="committee-item">
                                <i class="bi bi-check-circle"></i>Comité D’activités Socio-Digitales (CASD) en cours
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section><!-- End About Section -->
        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <p>Objectifs Association</p>
                </div>
                <div class="row">
                    <div class="col-lg-12 pt-2 pt-lg-0 order-2 order-lg-1 content">
                        <ul class="committee-list">
                            <li class="committee-item"><i class="bi bi-check-circle"></i> Intégration des gens au monde du
                                développement digital et généraliser les principes du développement digital pour que les
                                gens puissent se familiariser avec ce domaine, peu importe leur âge.</li>
                            <li class="committee-item"><i class="bi bi-check-circle"></i> Consolidation des principes et
                                caractéristiques de la confiance digitale afin de se méfier des crimes électroniques.</li>
                            <li class="committee-item"><i class="bi bi-check-circle"></i> Evolution des compétences
                                technologiques électroniques du centre en effectuant des partenariats avec des entreprises
                                et sponsorisation.</li>
                            <li class="committee-item"><i class="bi bi-check-circle"></i> Renforcement des bases de
                                coopération de l’association, collaboration entre les différentes équipes au sein du comité
                                quelque soit le réseau abordé soit informatique, architecture, ou bien tout ce qui est
                                système embarqué.</li>
                            <li class="committee-item"><i class="bi bi-check-circle"></i> Préparation des réunions,
                                conférences et mise de point entre les différents membres.</li>
                            <li class="committee-item"><i class="bi bi-check-circle"></i> Elaboration des stages pour ceux
                                qui sont intéressés au sein de l’association sous un cachet légal afin de leurs aider à
                                mieux évoluer leurs compétences.</li>
                            <li class="committee-item"><i class="bi bi-check-circle"></i> Organisation des réunions avec des
                                gens du domaine du développement digital dans tout le monde, soit en présentiel ou à
                                distance.</li>
                            <li class="committee-item"><i class="bi bi-check-circle"></i> Protection des droits des
                                étudiants, leur aider à trouver après des emplois et à bénéficier d’autres avantages de
                                plus.</li>
                            <li class="committee-item"><i class="bi bi-check-circle"></i> Développement d’un comité de
                                formation et d’encadrement dédié pour le développement de l’association en tout ce qui
                                concerne offrir des formations aux gens avec des certificats bien mérités après.</li>
                            <li class="committee-item"><i class="bi bi-check-circle"></i> Création des opportunités de
                                travails pour les gens qui souffrent du chômage.</li>
                            <li class="committee-item"><i class="bi bi-check-circle"></i> Dispersion de l’association et
                                sa propagation dans plusieurs coins et villes du Maroc suivant la loi interne.</li>
                            <li class="committee-item"><i class="bi bi-check-circle"></i> Fusionnement avec d’autres
                                associations du même domaine soit interne au Maroc ou bien externe à l’étranger pour une
                                extension du réseau informatique.</li>
                            <li class="committee-item"><i class="bi bi-check-circle"></i> Collaboration avec des centres
                                de carrières et clubs informatiques des autres universités, écoles supérieures.</li>
                            <li class="committee-item"><i class="bi bi-check-circle"></i> Participation des différents
                                associés par des sommes d’argent modestes sous le nom de l’association.</li>
                            <li class="committee-item"><i class="bi bi-check-circle"></i> Transformation de la trésorerie
                                de l’association soigneusement dans un compte bancaire qui ne sera disponible que sous
                                l’autorisation du président afin de bien gérer les besoins du club et équipements.</li>
                            <li class="committee-item"><i class="bi bi-check-circle"></i> Engendrement d’un cachet de
                                l’association qui n’est utilisé que par le président et son adjoint.</li>
                    </div>
                </div>

            </div>
        </section><!-- End About Section -->
        <!-- partenaire test  -->
        {{-- @include('frontend.partenaire') --}}

        <!-- end partenaire test -->
        <!--==== partenaire ========= -->
        <!-- Flickity HTML init -->
        <section class="customer-logos slider">
            @foreach ($partenaires as $partenaire)
                <div class="slide">
                    <a href="{{ $partenaire->lien }}"><img class="parten"
                            src="{{ asset('frontend/img/partenaires/' . $partenaire->image) }}" alt="Image 1"></a>
                </div>
            @endforeach
        </section>

        <!-- End partenaire Section -->
        <!-- ======= Testimonials Section ======= -->
        <section id="corps" class="testimonials">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Corps Technique et professionnel et assiocatif</h2>
                    <p>AU SERVICE DES DE LA SOCIETE CVILE DIGITALE DE DEMAIN</p>
                </div>

                <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
                    <div class="swiper-wrapper">
                        @foreach ($users as $user)
                            <div class="swiper-slide">
                                <div class="testimonial-wrap">
                                    <div class="testimonial-item">
                                        <img src="{{ $user->image ? asset('frontend/img/' . $user->image) : asset('frontend/img/inknown.png') }}"
                                            class="testimonial-img" alt="">
                                        <h3>{{ $user->fname . ' ' . $user->lname }}</h3>
                                        <h4>{{ $user->profession }} </h4>
                                        <p>
                                            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                            nothing
                                            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                        </p>
                                    </div>
                                </div>
                            </div><!-- End testimonial item -->
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                </div>

            </div>
        </section><!-- End Testimonials Section -->

    </main><!-- End #main -->
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            font-family: Arial, sans-serif;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border: 1px solid #ccc;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        td {
            background-color: #fff;

        }

        #pro {
            background-color: var(--primary);
            color: white;
            font-weight: 600
        }

        @media (max-width:700px) {
            table {
                width: auto !important;
                height: auto !important;
            }

        }


        td.no-border-bottom {
            border-bottom: none;
        }

        .personDescription {
            background-color: #eeeeee;
            padding: 6px;
            border-radius: 6px;
            margin-top: -4px;
        }

        .tooltipBox {
            background-color: #666666;
            color: white;
            border-radius: 4px;
            padding: 4px;
        }
    </style>
    <script>
        var chart;

        JSC.fetch('orgData.csv')
            .then(function(response) {
                return response.text();
            })
            .then(function(text) {
                var data = JSC.csv2Json(text);
                chart = renderChart1(makeSeries1(data));
            });

        function renderChart1(series) {
            return JSC.chart('chartDiv', {
                type: 'organizational down',
                defaultTooltip: {
                    asHTML: true,
                    outline: 'none',
                    zIndex: 10
                },
                defaultPoint: {
                    focusGlow: false,
                    connectorLine: {
                        width: 1,
                        color: '#e0e0e0'
                    },
                    tooltip: '<div class="tooltipBox">Name: <b>%name</b><br>Membre: <b>%position</b></div>',
                    annotation: {
                        padding: 3,
                        asHTML: true,
                        margin: [12, 2],
                        label: {
                            text: '<img width=100 height=100 margin_bottom=4 src=%photo><br/><div class="personDescription"><b>%position</b><br/>%name<br/></div>',
                            autoWrap: false
                        }
                    },
                    outline_width: 0,
                    color: '#333333'
                },
                series: series
            });
        }

        function makeSeries1(data) {
            return [{
                points: data.map(function(item) {
                    return {
                        name: item.name,
                        id: item.id,
                        parent: item.parent,
                        attributes: {
                            position: '<span style="font-size:13px;">' +
                                item.position +
                                '</span>',
                            photo: 'frontend/img/avatar/' + item.photo + '.png'
                        }
                    };
                })
            }];
        }
        //===============================================//
        // JS
        var chart2;

        JSC.fetch('orggData.csv')
            .then(function(response) {
                return response.text();
            })
            .then(function(text) {
                var data = JSC.csv2Json(text);
                chart2 = renderChart(makeSeries(data));
            });

        function renderChart(series) {
            return JSC.chart('chartDiv2', {
                type: 'organizational down',
                defaultTooltip: {
                    asHTML: true,
                    outline: 'none',
                    zIndex: 10
                },
                defaultPoint: {
                    focusGlow: false,
                    connectorLine: {
                        width: 1,
                        color: '#0080c9'
                    },
                    tooltip: '<div class="tooltipBox"><br>Name: <b>%name</b><br>Memebr: <b>%position</b></div>',
                    annotation: {
                        padding: 3,
                        asHTML: true,
                        margin: [12, 2],
                        label: {
                            text: '<img width=64 height=64 margin_bottom=4 src=%photo><br/><div class="personDescription"><b>%position</b><br/>%name<br/></div>',
                            autoWrap: false
                        }
                    },
                    outline_width: 0,
                    color: '#333333'
                },
                series: series
            });
        }

        function makeSeries(data) {
            return [{
                points: data.map(function(item) {
                    return {
                        name: item.name,
                        id: item.id,
                        parent: item.parent,
                        attributes: {
                            position: '<span style="font-size:13px;">' +
                                item.position +
                                '</span>',
                            name: item.name,
                            address: item.address,
                            photo: 'images/avatar' +
                                item.photo +
                                '.png'
                        }
                    };
                })
            }];
        }
        /**Site Source of picturs */

        //https://jscharting.com/samples/images/avatar1.png
        /**Make Image round */
        //https://www.quickpicturetools.com/en/rounded_corners/
        //..//amdd/Resources/assets/img/association
        //'..//amdd/images/ceo.png'
    </script>
@endsection
