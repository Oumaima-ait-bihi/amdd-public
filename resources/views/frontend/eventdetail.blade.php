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
                    <h2>Evénement en detail</h2>
                </div>
            </div><!-- End Breadcrumbs -->
        </div><!-- End Parallax -->

        <!-- ======= Cource Details Section ======= -->

        @if (app()->getLocale() == 'ar')
            <section id="course-details" class="course-details" dir="rtl">

                <div class="container eventdetail" data-aos="fade-up">
                    <div class="event1">
                        <!-- Flickity HTML init -->
                        <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
                            <!-- <div class="gallery js-flickity" data-flickity-options='{ "wrapAround": true }'>
                                                                                                          @foreach ($event->gallery as $photo)
    <img src="{{ asset('frontend/img/events/' . $photo) }}" alt="Image 1">
                                                                                                                                        </div>
    @endforeach
                                                                                                      </div> -->
                            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    @foreach ($event->gallery as $photo)
                                        @if ($loop->first)
                                            <div class="carousel-item item active">
                                                <img class="d-block w-100"
                                                    src="{{ asset('frontend/img/events/gallery/' . $photo) }}"
                                                    alt="Image 1">
                                            </div>
                                        @else
                                            <div class="carousel-item item">
                                                <img class="d-block w-100"
                                                    src="{{ asset('frontend/img/events/gallery/' . $photo) }}"
                                                    alt="Image 1">
                                            </div>
                                        @endif
                                    @endforeach
                                    <a class="carousel-control-prev" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    </a>
                                    <a class="carousel-control-next" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
                            <h3>{{ $event->titre_ar }}</h3>
                            <p class="fst-italic" style="direction: rtl;">
                                {{ $event->description_ar }}
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="course-info d-flex justify-content-between align-items-center">
                            <h5>@lang("messages.date de début de l'événement")</h5>
                            <p><a href="#">{{ $event->date_debut }}</a></p>
                        </div>
                        <div class="course-info d-flex justify-content-between align-items-center">
                            <h5>@lang("messages.date de fin de l'événement") </h5>
                            <p><a href="#">{{ $event->date_fin }}</a></p>
                        </div>
                        @foreach ($event->links as $link)
                            <div class="course-info d-flex justify-content-between align-items-center">
                                <a href="{{ $link }}">@lang("messages.lien de l'activité")</a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @elseif (app()->getLocale() == 'fr')
            <section id="course-details" class="course-details">

                <div class="container eventdetail" data-aos="fade-up">
                    <div class="event1">
                        <!-- Flickity HTML init -->
                        <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
                            <!-- <div class="gallery js-flickity" data-flickity-options='{ "wrapAround": true }'>
                                                                                                      @foreach ($event->gallery as $photo)
    <img src="{{ asset('frontend/img/events/' . $photo) }}" alt="Image 1">
                                                                                                                                    </div>
    @endforeach
                                                                                                  </div> -->
                            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    @foreach ($event->gallery as $photo)
                                        @if ($loop->first)
                                            <div class="carousel-item item active">
                                                <img class="d-block w-100"
                                                    src="{{ asset('frontend/img/events/gallery/' . $photo) }}"
                                                    alt="Image 1">
                                            </div>
                                        @else
                                            <div class="carousel-item item">
                                                <img class="d-block w-100"
                                                    src="{{ asset('frontend/img/events/gallery/' . $photo) }}"
                                                    alt="Image 1">
                                            </div>
                                        @endif
                                    @endforeach
                                    <a class="carousel-control-prev" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    </a>
                                    <a class="carousel-control-next" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
                            <h3>{{ $event->titre_fr }}</h3>
                            <p class="fst-italic">
                                {{ $event->description_fr }}
                            </p>
                        </div>
                    </div>
                    <div class="event2 col-lg-4">
                        <div class="course-info d-flex justify-content-between align-items-center">
                            <h5>@lang("messages.date de début de l'événement")</h5>
                            <p><a href="#">{{ $event->date_debut }}</a></p>
                        </div>
                        <div class="course-info d-flex justify-content-between align-items-center">
                            <h5>@lang("messages.date de fin de l'événement") </h5>
                            <p><a href="#">{{ $event->date_fin }}</a></p>
                        </div>
                        @foreach ($event->links as $link)
                            <div class="course-info d-flex justify-content-between align-items-center">
                                <a href="{{ $link }}">@lang("messages.lien de l'activité")</a>
                            </div>
                        @endforeach
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
