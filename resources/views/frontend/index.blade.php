@extends('frontend.layouts.app')
@section('title')
    <title>Acceuil |AMDD</title>
@endsection
<style>
    @media (max-width: 590px) {
        .cercle3 h1 {
            font-size: 35px !important;
            font-weight: 800 !important;
            width: 50% !important
        }

        .cercle3 p {
            font-size: small !important;
            width: 40% !important
        }

        .cercle3 button {
            width: 30% !important;
            padding: 5px !important
        }

        .section-title p {
            font-size: large !important
        }
    }

    .about {
        height: fit-content !important;
    }

    /* Play button */
    .play-button {
        width: 60px;
        height: 60px;
        background-color: #3498db;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        position: absolute;

        left: 50%;
        transform: translate(-50%, -50%);
        cursor: pointer;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        z-index: 10;
    }

    /* Video Modal */
    .video-modal {
        display: none;
        /* Hidden by default */
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.7);
        justify-content: center;
        align-items: center;
        z-index: 100;
    }

    /* Modal Content */
    .modal-content {
        position: relative;
        width: 80%;
        max-width: 800px;
    }

    /* Close button */
    .close-button {
        position: absolute;
        top: 10px;
        left: 10px;
        background-color: #fff;
        border-radius: 50%;
        padding: 5px;
        width: 50px;
        height: 50px;
        cursor: pointer;
        z-index: 10000
    }

    .close-button svg {
        fill: #3498db;
    }

    .about video {}

    .card-img-top {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    @import url(//fonts.googleapis.com/css?family=Montserrat:300,500);

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

    .btn {
        color: #fff;
        cursor: pointer;
        font-size: 16px;
        font-weight: 400;
        line-height: 45px;
        margin: 0 0 2em;
        max-width: 160px;
        position: relative;
        text-decoration: none;
        text-transform: uppercase;
        width: 100%;

        @media(min-width: 600px) {

            margin: 0 1em 2em;
        }

        &:hover {
            text-decoration: none;
        }

    }
</style>
@section('content')
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex justify-content-center align-items-center w-100">


        <div class="fristPage">
            <div class="cercle1">
                <div class="cercle2">
                    <div class="cercle3">
                        <h1>@lang('messages.Adhérer') <spn class="title"> @lang('messages.demain')</spn>
                        </h1>
                        <p>@lang('messages.corps')</p>
                        <a href="{{ route('frontend.adhesion') }}">
                            <button>@lang('messages.Adhesion')</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="custom-shape-divider-bottom-1687189528">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path
                    d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z"
                    opacity=".25" class="shape-fill"></path>
                <path
                    d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z"
                    opacity=".5" class="shape-fill"></path>
                <path
                    d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z"
                    class="shape-fill"></path>
            </svg>
        </div>

    </section><!-- End Hero -->


    <main id="main">
        <section id="about" class="about">
            <div class="container" data-aos="fade-up">
                <div class="row">
                    @if (app()->getLocale() == 'ar')
                        <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
                            <video width="100%" height="fit-content" controls loop muted autoplay>
                                <source src="{{ asset('frontend/videos/presentation.mp4') }}" type="video/mp4">
                            </video>
                        </div>
                        <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-left"
                            data-aos-delay="200" dir="rtl">
                            <div class="content">
                                <h2>@lang('messages.À Propos de Nous')</h2>
                                <p>
                                    @lang('messages.AMDD')
                                </p>
                                <ul>
                                    <li><i class="bx bx-check-circle"></i> @lang('messages.Encourager')</li>
                                    <li><i class="bx bx-check-circle"></i> @lang('messages.Sensibilisation')</li>
                                    <li><i class="bx bx-check-circle"></i> @lang('messages.Support')</li>
                                    <li><i class="bx bx-check-circle"></i> @lang('messages.Collaboration')</li>
                                </ul>
                                <a href="{{ route('frontend.association') }}" class="btn-learn-more">@lang('messages.En Savoir Plus')</a>
                            </div>
                        </div>
                    @elseif(app()->getLocale() == 'fr')
                        <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
                            <video width="100%" height="fit-content" controls loop muted autoplay>
                                <source src="{{ asset('frontend/videos/presentation.mp4') }}" type="video/mp4">
                            </video>
                        </div>
                        <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-left"
                            data-aos-delay="200">
                            <div class="content">
                                <h2>@lang('messages.À Propos de Nous')</h2>
                                <p>
                                    @lang('messages.AMDD')
                                </p>
                                <ul>
                                    <li><i class="bx bx-check-circle"></i> @lang('messages.Encourager')</li>
                                    <li><i class="bx bx-check-circle"></i> @lang('messages.Sensibilisation')</li>
                                    <li><i class="bx bx-check-circle"></i> @lang('messages.Support')</li>
                                    <li><i class="bx bx-check-circle"></i> @lang('messages.Collaboration')</li>
                                </ul>
                                <a href="{{ route('frontend.association') }}" class="btn-learn-more">@lang('messages.En Savoir Plus')</a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </section>


        <!-- End Trainers Section -->
        <!-- ======= Counts Section ======= -->
        <section id="counts" class="counts section-bg">
            <div class="container">
                @if (app()->getLocale() == 'ar')
                    <div class="row counters" dir="rtl">
                        <div class="col-lg-4 col-12 text-center">
                            <span data-purecounter-start="0" data-purecounter-end="{{ $members }}"
                                data-purecounter-duration="1" class="purecounter"></span>
                            <p>@lang('messages.Membres')</p>
                        </div>

                        <div class="col-lg-4 col-12 text-center">
                            <span data-purecounter-start="0" data-purecounter-end="{{ $evenements }}"
                                data-purecounter-duration="1" class="purecounter"></span>
                            <p>@lang('messages.Evénements')</p>
                        </div>

                        <div class="col-lg-4 col-12 text-center">
                            <span data-purecounter-start="0" data-purecounter-end="{{ $activities }}"
                                data-purecounter-duration="1" class="purecounter"></span>
                            <p>@lang('messages.Activités')</p>
                        </div>
                    </div>
                @elseif(app()->getLocale() == 'fr')
                    <div class="row counters">
                        <div class="col-lg-4 col-12 text-center">
                            <span data-purecounter-start="0" data-purecounter-end="{{ $members }}"
                                data-purecounter-duration="1" class="purecounter"></span>
                            <p>@lang('messages.Membres')</p>
                        </div>

                        <div class="col-lg-4 col-12 text-center">
                            <span data-purecounter-start="0" data-purecounter-end="{{ $evenements }}"
                                data-purecounter-duration="1" class="purecounter"></span>
                            <p>@lang('messages.Evénements')</p>
                        </div>

                        <div class="col-lg-4 col-12 text-center">
                            <span data-purecounter-start="0" data-purecounter-end="{{ $activities }}"
                                data-purecounter-duration="1" class="purecounter"></span>
                            <p>@lang('messages.Activités')</p>
                        </div>
                    </div>
                @endif
            </div>
        </section><!-- End Counts Section -->

        <section id="services" class="services">
            @if (app()->getLocale() == 'ar')
                <div class="container" data-aos="fade-up" dir="rtl">
                    <div class="section-title">
                        <h2>@lang('messages.Nos Services')</h2>
                        <p>@lang('messages.DÉCOUVREZ CE QUE NOUS OFFRONS')</p>
                    </div>

                    <div class="services-grid">
                        <div class="service-card" data-aos="zoom-in" data-aos-delay="100">
                            <div class="icon">
                                <i class="bx bx-world"></i>
                            </div>
                            <h3>@lang('messages.Service Global')</h3>
                            <p>@lang('messages.Des solutions complètes adaptées à vos besoins dans le monde entier')</p>
                        </div>

                        <div class="service-card" data-aos="zoom-in" data-aos-delay="200">
                            <div class="icon">
                                <i class="bx bx-briefcase"></i>
                            </div>
                            <h3>@lang('messages.Consultation Professionnelle')</h3>
                            <p>@lang('messages.Des conseils personnalisés pour chaque étape de votre projet')</p>
                        </div>

                        <div class="service-card" data-aos="zoom-in" data-aos-delay="300">
                            <div class="icon">
                                <i class="bx bx-cog"></i>
                            </div>
                            <h3>@lang('messages.Support Technique')</h3>
                            <p>@lang('messages.Assistance et maintenance 24/7 pour une tranquillité totale')</p>
                        </div>

                        <div class="service-card" data-aos="zoom-in" data-aos-delay="300">
                            <div class="icon">
                                <i class='bx bxs-award'></i>
                            </div>
                            <h3>@lang('messages.Formation')</h3>
                            <p>@lang('messages.formation_amdd')</p>
                        </div>
                        <div class="service-card" data-aos="zoom-in" data-aos-delay="300">
                            <div class="icon">
                                <i class='bx bx-network-chart'></i>
                            </div>
                            <h3>@lang('messages.Activités sociaux digital')</h3>
                            <p>@lang('messages.sociaux_digital')</p>
                        </div>
                    </div>
                </div>
            @elseif(app()->getLocale() == 'fr')
                <div class="container" data-aos="fade-up">
                    <div class="section-title">
                        <h2>@lang('messages.Nos Services')</h2>
                        <p>@lang('messages.DÉCOUVREZ CE QUE NOUS OFFRONS')</p>
                    </div>

                    <div class="services-grid">
                        <div class="service-card" data-aos="zoom-in" data-aos-delay="100">
                            <div class="icon">
                                <i class="bx bx-world"></i>
                            </div>
                            <h3>@lang('messages.Service Global')</h3>
                            <p>@lang('messages.Des solutions complètes adaptées à vos besoins dans le monde entier')</p>
                        </div>

                        <div class="service-card" data-aos="zoom-in" data-aos-delay="200">
                            <div class="icon">
                                <i class="bx bx-briefcase"></i>
                            </div>
                            <h3>@lang('messages.Consultation Professionnelle')</h3>
                            <p>@lang('messages.Des conseils personnalisés pour chaque étape de votre projet')</p>
                        </div>

                        <div class="service-card" data-aos="zoom-in" data-aos-delay="300">
                            <div class="icon">
                                <i class="bx bx-cog"></i>
                            </div>
                            <h3>@lang('messages.Support Technique')</h3>
                            <p>@lang('messages.Assistance et maintenance 24/7 pour une tranquillité totale')</p>
                        </div>

                        <div class="service-card" data-aos="zoom-in" data-aos-delay="300">
                            <div class="icon">
                                <i class='bx bxs-award'></i>
                            </div>
                            <h3>@lang('messages.Formation')</h3>
                            <p>@lang('messages.formation_amdd')</p>
                        </div>
                        <div class="service-card" data-aos="zoom-in" data-aos-delay="300">
                            <div class="icon">
                                <i class='bx bx-network-chart'></i>
                            </div>
                            <h3>@lang('messages.Activités sociaux digital')</h3>
                            <p>@lang('messages.sociaux_digital')</p>
                        </div>
                    </div>
                </div>
            @endif
        </section>


        <section id="why-choose-us" class="why-choose-us">
            @if (app()->getLocale() == 'ar')
                <div class="container" data-aos="fade-up" dir="rtl">
                    <div class="section-title">
                        <h2 class="title">@lang('messages.Pourquoi Nous Choisir')</h2>
                        <p class="subtitle">@lang('messages.LES AVANTAGES QUI NOUS RENDENT UNIQUES')</p>
                    </div>

                    <div class="features-grid">
                        <div class="feature-item" data-aos="fade-up" data-aos-delay="100">
                            <div class="icon-box">
                                <i class="bx bx-shield"></i>
                            </div>
                            <h3>@lang('messages.Sécurité et Fiabilité')</h3>
                            <p>@lang('messages.Nous garantissons une sécurité optimale avec des services fiables à chaque étape')</p>
                        </div>

                        <div class="feature-item" data-aos="fade-up" data-aos-delay="200">
                            <div class="icon-box">
                                <i class="bx bx-time-five"></i>
                            </div>
                            <h3>@lang('messages.Support 24/7')</h3>
                            <p>@lang('messages.Notre équipe est disponible à tout moment pour répondre à vos besoins')</p>
                        </div>

                        <div class="feature-item" data-aos="fade-up" data-aos-delay="300">
                            <div class="icon-box">
                                <i class="bx bx-money"></i>
                            </div>
                            <h3>@lang('messages.Prix Abordables')</h3>
                            <p>@lang('messages.Profitez des services de qualité à des prix qui respectent votre budget')</p>
                        </div>

                        <div class="feature-item" data-aos="fade-up" data-aos-delay="400">
                            <div class="icon-box">
                                <i class="bx bx-star"></i>
                            </div>
                            <h3>@lang('messages.Excellence Garantie')</h3>
                            <p>@lang('messages.Nous nous engageons à offrir des résultats exceptionnels à chaque fois')</p>
                        </div>
                    </div>
                </div>
            @elseif(app()->getLocale() == 'fr')
                <div class="container" data-aos="fade-up">
                    <div class="section-title">
                        <h2 class="title">@lang('messages.Pourquoi Nous Choisir')</h2>
                        <p class="subtitle">@lang('messages.LES AVANTAGES QUI NOUS RENDENT UNIQUES')</p>
                    </div>

                    <div class="features-grid">
                        <div class="feature-item" data-aos="fade-up" data-aos-delay="100">
                            <div class="icon-box">
                                <i class="bx bx-shield"></i>
                            </div>
                            <h3>@lang('messages.Sécurité et Fiabilité')</h3>
                            <p>@lang('messages.Nous garantissons une sécurité optimale avec des services fiables à chaque étape')</p>
                        </div>

                        <div class="feature-item" data-aos="fade-up" data-aos-delay="200">
                            <div class="icon-box">
                                <i class="bx bx-time-five"></i>
                            </div>
                            <h3>@lang('messages.Support 24/7')</h3>
                            <p>@lang('messages.Notre équipe est disponible à tout moment pour répondre à vos besoins')</p>
                        </div>

                        <div class="feature-item" data-aos="fade-up" data-aos-delay="300">
                            <div class="icon-box">
                                <i class="bx bx-money"></i>
                            </div>
                            <h3>@lang('messages.Prix Abordables')</h3>
                            <p>@lang('messages.Profitez des services de qualité à des prix qui respectent votre budget')</p>
                        </div>

                        <div class="feature-item" data-aos="fade-up" data-aos-delay="400">
                            <div class="icon-box">
                                <i class="bx bx-star"></i>
                            </div>
                            <h3>@lang('messages.Excellence Garantie')</h3>
                            <p>@lang('messages.Nous nous engageons à offrir des résultats exceptionnels à chaque fois')</p>
                        </div>
                    </div>
                </div>
            @endif
        </section>


        <!-- ======= Testimonials Section ======= -->
        <section id="testimonials" class="testimonials">
            @if (app()->getLocale() == 'ar')
                <div class="container" data-aos="fade-up" dir="rtl">
                    <div class="section-title">
                        <h2 class="title">@lang('messages.Témoignages')</h2>
                        <p class="subtitle">@lang('messages.DISENT')</p>
                    </div>

                    <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
                        <div class="swiper-wrapper">
                            @foreach ($testemonials as $testemonial)
                                <div class="swiper-slide">
                                    <div class="testimonial-card">
                                        <img src="{{ asset('frontend/img/testimonials/' . $testemonial->image) }}"
                                            class="testimonial-img" alt="Photo of {{ $testemonial->nom_ar }}">
                                        <div class="testimonial-content">
                                            <h3 class="testimonial-name">{{ $testemonial->nom_ar }}</h3>
                                            <h4 class="testimonial-profession">{{ $testemonial->profession_ar }}</h4>
                                            <p class="testimonial-message">
                                                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                                {{ $testemonial->message_ar }}
                                                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @elseif(app()->getLocale() == 'fr')
                <div class="container" data-aos="fade-up">
                    <div class="section-title">
                        <h2 class="title">@lang('messages.Témoignages')</h2>
                        <p class="subtitle">@lang('messages.DISENT')</p>
                    </div>

                    <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
                        <div class="swiper-wrapper">
                            @foreach ($testemonials as $testemonial)
                                <div class="swiper-slide">
                                    <div class="testimonial-card">
                                        <img src="{{ asset('frontend/img/testimonials/' . $testemonial->image) }}"
                                            class="testimonial-img" alt="Photo of {{ $testemonial->nom }}">
                                        <div class="testimonial-content">
                                            <h3 class="testimonial-name">{{ $testemonial->nom }}</h3>
                                            <h4 class="testimonial-profession">{{ $testemonial->profession }}</h4>
                                            <p class="testimonial-message">
                                                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                                {{ $testemonial->message }}
                                                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
        </section>

    </main><!-- End #main -->
    <script>
        let navBar = document.getElementById("header")
        window.onscroll = () => {
            console.log(scrollY);
            if (scrollY >= 100) {
                navBar.style.boxShadow = "0 0 5px #e5e3e5"
                navBar.style.background = "white"
            } else {
                navBar.style.boxShadow = "0 0 0px "
                navBar.style.background = "transparent !important"
            }
        }
    </script>
@endsection
