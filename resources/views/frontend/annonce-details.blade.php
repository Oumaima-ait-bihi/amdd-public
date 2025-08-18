@extends('frontend.layouts.app')
@section('title')
    <title>
        Évènement |AMDD</title>
@endsection
@section('content')
    <main id="main">
        <!-- ======= Breadcrumbs ======= -->
        <div class="parallax">
            <div class="breadcrumbs" data-aos="fade-in">
                <div class="container">
                    @if(app()->getLocale() == 'ar')
                    <h2>@lang("messages.L'annonce en detail")</h2>
                    @elseif(app()->getLocale() == 'fr')
                    <h2>@lang("messages.L'annonce en detail")</h2>
                    @endif
                </div>
            </div><!-- End Breadcrumbs -->
        </div><!-- End Parallax -->

        <!-- ======= Cource Details Section ======= -->

        @if (app()->getLocale() == 'ar')
        <section id="course-details" class="course-details">

            <div class="container eventdetail" data-aos="fade-up">
                <div class="event1">
                    <!-- Flickity HTML init -->
                    <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
                        <h3>{{ $annonce->titre_annonce_ar }}</h3>
                        <p class="fst-italic">
                            {{ $annonce->description_annonce_ar }}
                        </p>
                    </div>
                </div>
                <div class="event2 col-lg-4">
                    <div class="course-info d-flex justify-content-between align-items-center">
                        <h5>@lang("messages.date de l'annonce") </h5>
                        <p>{{ $annonce->date_annonce }}</p>
                    </div>
                    <a href="{{ $annonce->link }}">@lang("messages.lien de l'annonce")</a>
                </div>
            </div>
        </section>
        @elseif (app()->getLocale() == 'fr')
            <section id="course-details" class="course-details">

                <div class="container eventdetail" data-aos="fade-up">
                    <div class="event1">
                        <!-- Flickity HTML init -->
                        <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
                            <h3>{{ $annonce->titre_annonce_fr }}</h3>
                            <p class="fst-italic">
                                {{ $annonce->description_annonce_fr }}
                            </p>
                        </div>
                    </div>
                    <div class="event2 col-lg-4">
                        <div class="course-info d-flex justify-content-between align-items-center">
                            <h5>@lang("messages.date de l'annonce") </h5>
                            <p>{{ $annonce->date_annonce }}</p>
                        </div>
                        <a href="{{ $annonce->link }}">@lang("messages.lien de l'annonce")</a>
                    </div>
                </div>
            </section>
        @endif
        <!-- End Cource Details Section -->
        <style>
            /* external css: flickity.css */

            /* external css: flickity.css */
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

            * {
                -webkit-box-sizing: border-box;
                box-sizing: border-box;
            }

            .eventdetail {
                display: flex;
                width: 100%;
                flex-wrap: wrap;
            }

            .event1 {
                width: 100%;

            }

            .event1 div {
                width: 100%;
            }

            @media (min-width: 1000px) {
                .event2 {

                    position: fixed !important;
                    right: 10px;
                    top: 10px;

                }

                .event1 {
                    width: 60%;

                }
            }

            body {
                font-family: sans-serif;
            }

            .gallery {
                background: #EEE;
            }

            .gallery-cell {
                width: 66%;
                height: 200px;
                margin-right: 10px;
                counter-increment: gallery-cell;
            }

            /* cell number */
            .gallery-cell:before {
                display: block;
                text-align: center;
                content: counter(gallery-cell);
                line-height: 200px;
                font-size: 80px;
                color: white;
            }

            .item img {
                width: 100%;
                height: 100% !important;
                object-fit: cover;
            }

            .item {
                height: 500px;
            }
        </style>
        <script>
            $('.carousel-control-prev').click(function() {
                console.log('h')
                $('#carouselExampleControls').carousel('prev');
            });

            $('.carousel-control-next').click(function() {
                $('#carouselExampleControls').carousel('next');
            });
        </script>
    </main><!-- End #main -->
@endsection
