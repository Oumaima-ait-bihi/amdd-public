@extends('frontend.layouts.app')
@section('title')
    <title>Association |AMDD</title>
@endsection
@section('content')
    <style>
        @import url(//fonts.googleapis.com/css?family=Montserrat:300,500);

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

        .team4 {
            font-family: "Montserrat", sans-serif;
            color: #8d97ad;
            font-weight: 300;
        }

        .team4 h1,
        .team4 h2,
        .team4 h3,
        .team4 h4,
        .team4 h5,
        .team4 h6 {
            color: #3e4555;
        }

        .team4 .font-weight-medium {
            font-weight: 500;
        }

        .team4 h5 {
            line-height: 22px;
            font-size: 18px;
        }

        .team4 .subtitle {
            color: #8d97ad;
            line-height: 24px;
            font-size: 13px;
        }

        .team4 ul li a {
            color: #8d97ad;
            padding-right: 15px;
            -webkit-transition: 0.1s ease-in;
            -o-transition: 0.1s ease-in;
            transition: 0.1s ease-in;
        }

        .team4 ul li a:hover {
            -webkit-transform: translate3d(0px, -5px, 0px);
            transform: translate3d(0px, -5px, 0px);
            color: #316ce8;
        }

        @media (max-width:600px) {
            .section-title p {
                font-size: large
            }
        }

        .slider {
            position: relative;
            display: flex;
            justify-content: flex-start;
            align-items: center;
            width: 100%;
            height: auto;
            overflow: hidden;
            background: rgb(255, 255, 255);
            border-radius: 16px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(7.4px);
            -webkit-backdrop-filter: blur(7.4px);
            border: 1px solid rgba(255, 255, 255, 0.4);
        }

        .slider-items {
            display: flex;
            gap: 20px;
            animation: scrolling 15s linear infinite;
        }

        .slider-items img {
            height: 100px;
            max-width: 150px;
            object-fit: contain;
            transition: transform 0.3s;
        }

        .slider-items img:hover {
            transform: scale(1.1);
        }

        /* Animation for infinite scrolling */
        @keyframes scrolling {
            from {
                transform: translateX(100%);
            }

            to {
                transform: translateX(-100%);
            }
        }
    </style>
    <main id="main">
        <!-- ======= Breadcrumbs ======= -->
        <div class="parallax">
            <div class="breadcrumbs" data-aos="fade-in">
                <div class="container">
                    <h2>@lang('messages.Association Maroccaine De Développement Digital (AMDD)')</h2>
                </div>
            </div><!-- End Breadcrumbs -->
        </div><!-- End Parallax -->
        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            @if (app()->getLocale() == 'ar')
                <div class="container" data-aos="fade-up" dir="rtl">
                    <div class="section-title">
                        <p>@lang('messages.L’ association AMDD a pour vocation')</p>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item">@lang('messages.Contribuer, par tous les moyens, au développement rapide et harmonieux de la formation et à l’amélioration de l’image du Société Civile AMDD')</li>
                        <li class="list-group-item">
                            @lang('messages.Veiller aux intérêts professionnels des étudiants en favorisant des stages au Maroc et à l’étranger pour les étudiants et les lauréats')
                        </li>
                        <li class="list-group-item">
                            @lang("messages.Organiser des réunions, conférences, stages, séminaires d'actualisation des connaissances")
                        </li>
                        <li class="list-group-item">
                            @lang("messages.Elaborer un bulletin d'information trimestriel, qui présente les temps forts de l’Association, les événements auxquels elle participe, les nouveaux Lauréats")
                        </li>
                        <li class="list-group-item">
                            @lang("messages.Resserrer les liens d'amitié et de solidarité entre les anciens lauréats et les nouvelles Promotions")
                        </li>
                        <li class="list-group-item">
                            @lang('messages.Animer une vie associative pour les lauréats AMDD')
                        </li>
                        <li class="list-group-item">
                            @lang('messages.Développer un pôle de compétence Informatique autour de l’expérience des anciens lauréats')
                        </li>
                        <li class="list-group-item">
                            @lang('messages.Impliquer les professionnels du monde de la Digital et Démarche Informatique')
                        </li>
                    </ul>
                    <div>
                        <br>
                    </div>
                    <div class="section-title">
                        <p>@lang('messages.Perspectives Association AMDD')</p>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item">
                            @lang('messages.Projet de transition du statut Association AMDD à la Fondation AMDD')
                        </li>
                    </ul>
                </div>
            @elseif(app()->getLocale() == 'fr')
                <div class="container" data-aos="fade-up">
                    <div class="section-title">
                        <p>@lang('messages.L’ association AMDD a pour vocation')</p>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item">@lang('messages.Contribuer, par tous les moyens, au développement rapide et harmonieux de la formation et à l’amélioration de l’image du Société Civile AMDD')</li>
                        <li class="list-group-item">
                            @lang('messages.Veiller aux intérêts professionnels des étudiants en favorisant des stages au Maroc et à l’étranger pour les étudiants et les lauréats')
                        </li>
                        <li class="list-group-item">
                            @lang("messages.Organiser des réunions, conférences, stages, séminaires d'actualisation des connaissances")
                        </li>
                        <li class="list-group-item">
                            @lang("messages.Elaborer un bulletin d'information trimestriel, qui présente les temps forts de l’Association, les événements auxquels elle participe, les nouveaux Lauréats")
                        </li>
                        <li class="list-group-item">
                            @lang("messages.Resserrer les liens d'amitié et de solidarité entre les anciens lauréats et les nouvelles Promotions")
                        </li>
                        <li class="list-group-item">
                            @lang('messages.Animer une vie associative pour les lauréats AMDD')
                        </li>
                        <li class="list-group-item">
                            @lang('messages.Développer un pôle de compétence Informatique autour de l’expérience des anciens lauréats')
                        </li>
                        <li class="list-group-item">
                            @lang('messages.Impliquer les professionnels du monde de la Digital et Démarche Informatique')
                        </li>
                    </ul>
                    <div>
                        <br>
                    </div>
                    <div class="section-title">
                        <p>@lang('messages.Perspectives Association AMDD')</p>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item">
                            @lang('messages.Projet de transition du statut Association AMDD à la Fondation AMDD')
                        </li>
                    </ul>
                </div>
            @endif
        </section><!-- End About Section -->
        <!-- ======= comite de l'association Section ======= -->
        <section id="comite" class="about">
            @if (app()->getLocale() == 'ar')
                <div class="container" data-aos="fade-up" dir="rtl">
                    <div class="row">
                        <div class="section-title">
                            <p>@lang("messages.Comités de l'association")</p>
                        </div>
                        <div class="col-lg-6 pt-2 pt-lg-0 order-2 order-lg-1 content">
                            <ul class="committee-list">
                                <li class="committee-item">
                                    <i class="bi bi-check-circle"></i>@lang('messages.Comité Communication, Marketing Digital et Documentation')
                                </li>
                                <li class="committee-item">
                                    <i class="bi bi-check-circle"></i> @lang('messages.Comité Développement Digital')
                                </li>
                                <li class="committee-item">
                                    <i class="bi bi-check-circle"></i> @lang('messages.Comité Encadrement Digital')
                                </li>
                                <li class="committee-item">
                                    <i class="bi bi-check-circle"></i> @lang('messages.Comité De Ressources Humaines & Relation Extérieur')
                                </li>
                                <li class="committee-item">
                                    <i class="bi bi-check-circle"></i>@lang('messages.Comité D’activités Socio-Digitales')
                                </li>
                                <li class="committee-item">
                                    <i class="bi bi-check-circle"></i>@lang('messages.Comité de Formation Digitale')
                                </li>
                                <li class="committee-item">
                                    <i class="bi bi-check-circle"></i>@lang('messages.Comité Conseil Juridique')
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            @elseif(app()->getLocale() == 'fr')
                <div class="container" data-aos="fade-up">
                    <div class="row">
                        <div class="section-title">
                            <p>@lang("messages.Comités de l'association")</p>
                        </div>
                        <div class="col-lg-6 pt-2 pt-lg-0 order-2 order-lg-1 content">
                            <ul class="committee-list">
                                <li class="committee-item">
                                    <i class="bi bi-check-circle"></i>@lang('messages.Comité Communication, Marketing Digital et Documentation')
                                </li>
                                <li class="committee-item">
                                    <i class="bi bi-check-circle"></i> @lang("Comité d'Encadrement, Développement Digital")
                                </li>
                                <li class="committee-item">
                                    <i class="bi bi-check-circle"></i> @lang('messages.Comité De Ressources Humaines & Relation Extérieur')
                                </li>
                                <li class="committee-item">
                                    <i class="bi bi-check-circle"></i>@lang('messages.Comité D’activités Socio-Digitales')
                                </li>
                                <li class="committee-item">
                                    <i class="bi bi-check-circle"></i>@lang('messages.Comité de Formation Digitale')
                                </li>
                                <li class="committee-item">
                                    <i class="bi bi-check-circle"></i>@lang('messages.Comité Conseil Juridique')
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            @endif
        </section><!-- End About Section -->
        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            @if (app()->getLocale() == 'ar')
                <div class="container" data-aos="fade-up" dir="rtl">
                    <div class="section-title">
                        <p>@lang('messages.Objectifs Association')</p>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 pt-2 pt-lg-0 order-2 order-lg-1 content">
                            <ul class="committee-list">
                                <li class="committee-item"><i class="bi bi-check-circle"></i>@lang('messages.Intégration des gens au monde du développement digital et généraliser les principes du développement digital pour que les gens puissent se familiariser avec ce domaine, peu importe leur âge')</li>
                                <li class="committee-item"><i class="bi bi-check-circle"></i>@lang('messages.Consolidation des principes et caractéristiques de la confiance digitale afin de se méfier des crimes électroniques')</li>
                                <li class="committee-item"><i class="bi bi-check-circle"></i>@lang('messages.Evolution des compétences technologiques électroniques du centre en effectuant des partenariats avec des entreprises et sponsorisation')</li>
                                <li class="committee-item"><i class="bi bi-check-circle"></i>@lang('messages.Renforcement des bases de coopération de l’association, collaboration entre les différentes équipes au sein du comité quelque soit le réseau abordé soit informatique, architecture, ou bien tout ce qui est système embarqué')</li>
                                <li class="committee-item"><i class="bi bi-check-circle"></i>@lang('messages.Préparation des réunions, conférences et mise de point entre les différents membres')</li>
                                <li class="committee-item"><i class="bi bi-check-circle"></i>@lang('messages.Elaboration des stages pour ceux qui sont intéressés au sein de l’association sous un cachet légal afin de leurs aider à mieux évoluer leurs compétences')</li>
                                <li class="committee-item"><i class="bi bi-check-circle"></i>@lang('messages.Organisation des réunions avec des gens du domaine du développement digital dans tout le monde, soit en présentiel ou à distance')</li>
                                <li class="committee-item"><i class="bi bi-check-circle"></i>@lang('messages.Protection des droits des étudiants, leur aider à trouver après des emplois et à bénéficier d’autres avantages de plus')</li>
                                <li class="committee-item"><i class="bi bi-check-circle"></i>@lang('messages.Développement d’un comité de formation et d’encadrement dédié pour le développement de l’association en tout ce qui concerne offrir des formations aux gens avec des certificats bien mérités après')</li>
                                <li class="committee-item"><i class="bi bi-check-circle"></i>@lang('messages.Création des opportunités de travails pour les gens qui souffrent du chômage')</li>
                                <li class="committee-item"><i class="bi bi-check-circle"></i>@lang('messages.Dispersion de l’association et sa propagation dans plusieurs coins et villes du Maroc suivant la loi interne')</li>
                                <li class="committee-item"><i class="bi bi-check-circle"></i>@lang('messages.Fusionnement avec d’autres associations du même domaine soit interne au Maroc ou bien externe à l’étranger pour une extension du réseau informatique')</li>
                                <li class="committee-item"><i class="bi bi-check-circle"></i>@lang('messages.Collaboration avec des centres de carrières et clubs informatiques des autres universités, écoles supérieures')</li>
                                <li class="committee-item"><i class="bi bi-check-circle"></i>@lang('messages.Participation des différents associés par des sommes d’argent modestes sous le nom de l’association')/li>
                                <li class="committee-item"><i class="bi bi-check-circle"></i>@lang('messages.Transformation de la trésorerie de l’association soigneusement dans un compte bancaire qui ne sera disponible que sous l’autorisation du président afin de bien gérer les besoins du club et équipements')</li>
                                <li class="committee-item"><i class="bi bi-check-circle"></i>@lang('messages.Engendrement d’un cachet de l’association qui n’est utilisé que par le président et son adjoint')</li>
                        </div>
                    </div>
                </div>
            @elseif(app()->getLocale() == 'fr')
                <div class="container" data-aos="fade-up">
                    <div class="section-title">
                        <p>@lang('messages.Objectifs Association')</p>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 pt-2 pt-lg-0 order-2 order-lg-1 content">
                            <ul class="committee-list">
                                <li class="committee-item"><i class="bi bi-check-circle"></i>@lang('messages.Intégration des gens au monde du développement digital et généraliser les principes du développement digital pour que les gens puissent se familiariser avec ce domaine, peu importe leur âge')</li>
                                <li class="committee-item"><i class="bi bi-check-circle"></i>@lang('messages.Consolidation des principes et caractéristiques de la confiance digitale afin de se méfier des crimes électroniques')</li>
                                <li class="committee-item"><i class="bi bi-check-circle"></i>@lang('messages.Evolution des compétences technologiques électroniques du centre en effectuant des partenariats avec des entreprises et sponsorisation')</li>
                                <li class="committee-item"><i class="bi bi-check-circle"></i>@lang('messages.Renforcement des bases de coopération de l’association, collaboration entre les différentes équipes au sein du comité quelque soit le réseau abordé soit informatique, architecture, ou bien tout ce qui est système embarqué')</li>
                                <li class="committee-item"><i class="bi bi-check-circle"></i>@lang('messages.Préparation des réunions, conférences et mise de point entre les différents membres')</li>
                                <li class="committee-item"><i class="bi bi-check-circle"></i>@lang('messages.Elaboration des stages pour ceux qui sont intéressés au sein de l’association sous un cachet légal afin de leurs aider à mieux évoluer leurs compétences')</li>
                                <li class="committee-item"><i class="bi bi-check-circle"></i>@lang('messages.Organisation des réunions avec des gens du domaine du développement digital dans tout le monde, soit en présentiel ou à distance')</li>
                                <li class="committee-item"><i class="bi bi-check-circle"></i>@lang('messages.Protection des droits des étudiants, leur aider à trouver après des emplois et à bénéficier d’autres avantages de plus')</li>
                                <li class="committee-item"><i class="bi bi-check-circle"></i>@lang('messages.Développement d’un comité de formation et d’encadrement dédié pour le développement de l’association en tout ce qui concerne offrir des formations aux gens avec des certificats bien mérités après')</li>
                                <li class="committee-item"><i class="bi bi-check-circle"></i>@lang('messages.Création des opportunités de travails pour les gens qui souffrent du chômage')</li>
                                <li class="committee-item"><i class="bi bi-check-circle"></i>@lang('messages.Dispersion de l’association et sa propagation dans plusieurs coins et villes du Maroc suivant la loi interne')</li>
                                <li class="committee-item"><i class="bi bi-check-circle"></i>@lang('messages.Fusionnement avec d’autres associations du même domaine soit interne au Maroc ou bien externe à l’étranger pour une extension du réseau informatique')</li>
                                <li class="committee-item"><i class="bi bi-check-circle"></i>@lang('messages.Collaboration avec des centres de carrières et clubs informatiques des autres universités, écoles supérieures')</li>
                                <li class="committee-item"><i class="bi bi-check-circle"></i>@lang('messages.Participation des différents associés par des sommes d’argent modestes sous le nom de l’association')/li>
                                <li class="committee-item"><i class="bi bi-check-circle"></i>@lang('messages.Transformation de la trésorerie de l’association soigneusement dans un compte bancaire qui ne sera disponible que sous l’autorisation du président afin de bien gérer les besoins du club et équipements')</li>
                                <li class="committee-item"><i class="bi bi-check-circle"></i>@lang('messages.Engendrement d’un cachet de l’association qui n’est utilisé que par le président et son adjoint')</li>
                        </div>
                    </div>
                </div>
            @endif
        </section><!-- End About Section -->
        <!-- ======= Partenaire Section ======= -->
        <section id="partners" class="partners">
            <div class="container" data-aos="fade-up">
                @if (app()->getLocale() == 'ar')
                    <div class="section-title" dir="rtl">
                        <p>@lang('messages.Nos partenaires')</p>
                    </div>
                @elseif(app()->getLocale() == 'fr')
                    <div class="section-title">
                        <p>@lang('messages.Nos partenaires')</p>
                    </div>
                @endif
                <div data-aos="zoom-in" data-aos-delay="100">
                    <div class="slider">
                        <div class="slider-items">
                            @foreach ($partenaires as $partenaire)
                                <img class="parten" src="{{ asset('frontend/img/partenaires/' . $partenaire->image) }}"
                                    alt="Partenaire {{ $loop->index + 1 }}">
                            @endforeach
                            <!-- Duplicate items for seamless looping -->
                            @foreach ($partenaires as $partenaire)
                                <img class="parten" src="{{ asset('frontend/img/partenaires/' . $partenaire->image) }}"
                                    alt="Partenaire Duplicate {{ $loop->index + 1 }}">
                            @endforeach
                            <!-- Duplicate items for seamless looping -->
                            @foreach ($partenaires as $partenaire)
                                <img class="parten" src="{{ asset('frontend/img/partenaires/' . $partenaire->image) }}"
                                    alt="Partenaire Duplicate {{ $loop->index + 1 }}">
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ======= End Partenaire Section ======= -->
    </main><!-- End #main -->
@endsection
