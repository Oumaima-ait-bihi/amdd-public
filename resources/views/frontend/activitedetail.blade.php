@extends('frontend.layouts.app')
@section('title')
    <title>Activités |AMDD</title>
@endsection
@section('content')
    <main id="main">
        <!-- ======= Breadcrumbs ======= -->
        <div class="parallax">
            <div class="breadcrumbs" data-aos="fade-in">
                <div class="container">
                    <h2>L'activité en détail</h2>
                </div>
            </div><!-- End Breadcrumbs -->
        </div><!-- End Parallax -->

        <!-- ======= Cource Details Section ======= -->

        <section id="course-details" class="course-details">
            @if (app()->getLocale() == 'ar')
                <div class="container eventdetail" data-aos="fade-up" dir="rtl">
                    <div class="event1">
                        <!-- Flickity HTML init -->
                        <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
                            <img src="{{ asset('frontend/img/activités/' . $activite->image) }}" alt="Image 1">
                        </div>
                        <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
                            <h3>{{ $activite->title_ar }}</h3>
                            <p class="fst-italic">
                                {{ $activite->description_ar }}
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="course-info d-flex justify-content-between align-items-center">
                            <h5>@lang('messages.date de début de l\'événement')</h5>
                            <p><a href="#">{{ $activite->start_date }}</a></p>
                        </div>
                        <div class="course-info d-flex justify-content-between align-items-center">
                            <h5>@lang('messages.date de fin de l\'événement') </h5>
                            <p><a href="#">{{ $activite->end_date }}</a></p>
                        </div>
                        <div class="course-info d-flex justify-content-between align-items-center">
                            <h5>@lang('messages.Location') </h5>
                            <p><a href="#">{{ $activite->location_ar }}</a></p>
                        </div>
                        <div class="course-info d-flex justify-content-between align-items-center">
                            <a href="{{ $activite->link }}">@lang('messages.lien de l\'activité')</a>
                        </div>
                    </div>
                </div>
            @elseif (app()->getLocale() == 'fr')
                <div class="container eventdetail" data-aos="fade-up">
                    <div class="event1">
                        <!-- Flickity HTML init -->
                        <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
                            <img src="{{ asset('frontend/img/activités/' . $activite->image) }}" alt="Image 1">
                        </div>
                        <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
                            <h3>{{ $activite->title }}</h3>
                            <p class="fst-italic">
                                {{ $activite->description }}
                            </p>
                        </div>
                    </div>
                    <div class="event2 col-lg-4">
                        <div class="course-info d-flex justify-content-between align-items-center">
                            <h5>@lang('messages.date de début de l\'événement')</h5>
                            <p><a href="#">{{ $activite->start_date }}</a></p>
                        </div>
                        <div class="course-info d-flex justify-content-between align-items-center">
                            <h5>@lang('messages.date de fin de l\'événement') </h5>
                            <p><a href="#">{{ $activite->end_date }}</a></p>
                        </div>
                        <div class="course-info d-flex justify-content-between align-items-center">
                            <h5>@lang('messages.Location') </h5>
                            <p><a href="#">{{ $activite->location_ar }}</a></p>
                        </div>
                        <div class="course-info d-flex justify-content-between align-items-center">
                            <a href="{{ $activite->link }}">@lang('messages.lien de l\'activité')</a>
                        </div>
                    </div>
                </div>
            @endif
        </section><!-- End Cource Details Section -->
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
                    right: 277px;
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
