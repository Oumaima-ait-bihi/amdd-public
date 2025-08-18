@extends('frontend.layouts.app')
@section('title')
    <title>Annonces |AMDD</title>
@endsection
@section('content')
    <style>
        /* ----------------------------------------------------------------------- */
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

        .blog-card {
            display: flex;
            flex-direction: column;
            margin: auto;
            box-shadow: 0 3px 7px -1px rgba(0, 0, 0, 0.1);
            margin-bottom: 1.6%;
            background-color: #F5F5F5;
            line-height: 1.4;
            font-family: sans-serif;
            border-radius: 5px;
            overflow: hidden;
            z-index: 0;
        }

        .blog-card a {
            color: inherit;
        }

        .blog-card a:hover {
            color: #3fbbc0;
        }

        .blog-card:hover .photo {
            -webkit-transform: scale(1.3) rotate(3deg);
            transform: scale(1.3) rotate(3deg);
        }

        .blog-card .meta {
            position: relative;
            z-index: 0;
            height: 200px;
        }

        .blog-card .photo {
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            transition: -webkit-transform .2s;
            background-size: cover;
            background-position: center;
            transition: transform .2s;
            transition: transform .2s, -webkit-transform .2s;
        }

        .blog-card .details,
        .blog-card .details ul {
            margin: auto;
            padding: 0;
            list-style: none;
        }

        .blog-card .details {
            position: absolute;
            top: 0;
            bottom: 0;
            left: -100%;
            margin: auto;
            transition: left 0s;
            background: rgba(0, 0, 0, 0.6);
            color: #fff;
            padding: 10px;
            width: 100%;
            font-size: .9rem;
        }

        .blog-card .details a {
            -webkit-text-decoration: dotted underline;
            text-decoration: dotted underline;
        }

        .blog-card .details ul li {
            display: inline-block;
        }

        .blog-card .details .author:before {
            font-family: FontAwesome;
            margin-right: 10px;
            content: "\f007";
        }

        .blog-card .details .date:before {
            font-family: FontAwesome;
            margin-right: 10px;
            content: "\f133";
        }

        .blog-card .details .tags ul:before {
            font-family: FontAwesome;
            content: "\f02b";
            margin-right: 10px;
        }

        .blog-card .details .tags li {
            margin-right: 2px;
        }

        .blog-card .details .tags li:first-child {
            margin-left: -4px;
        }

        .blog-card .description {
            padding: 1rem;
            background: #fff;
            position: relative;
            z-index: 1;
        }

        .blog-card .description h1,
        .blog-card .description h2 {
            font-family: Poppins, sans-serif;
        }

        .blog-card .description h1 {
            line-height: 1;
            margin: 0;
            font-size: 1.7rem;
        }

        .blog-card .description h2 {
            font-size: 1rem;
            font-weight: 300;
            text-transform: uppercase;
            color: #a2a2a2;
            margin-top: 5px;
        }

        .blog-card .description .read-more {
            text-align: right;
        }

        .blog-card .description .read-more a {
            color: #3fbbc0;
            display: inline-block;
            position: relative;
            text-decoration: none;
        }

        .blog-card .description .read-more a:after {
            content: "\f061";
            font-family: FontAwesome;
            margin-left: -10px;
            opacity: 0;
            vertical-align: middle;
            transition: margin .3s, opacity .3s;
        }

        .blog-card .description .read-more a:hover:after {
            margin-left: 5px;
            opacity: 1;
        }

        .blog-card p {
            position: relative;
            margin: 1rem 0 0;
        }

        .blog-card p:first-of-type {
            margin-top: 1.25rem;
        }

        .blog-card p:first-of-type:before {
            content: "";
            position: absolute;
            height: 5px;
            background: #3fbbc0;
            width: 35px;
            top: -0.75rem;
            border-radius: 3px;
        }

        .blog-card:hover .details {
            left: 0%;
        }

        @media (min-width: 640px) {
            .blog-card {
                flex-direction: row;
                max-width: 1000px;
            }

            .blog-card .meta {
                flex-basis: 40%;
                height: auto;
            }

            .blog-card .description {
                flex-basis: 60%;
            }

            .blog-card .description:before {
                -webkit-transform: skewX(-3deg);
                transform: skewX(-3deg);
                content: "";
                background: #fff;
                width: 30px;
                position: absolute;
                left: -10px;
                top: 0;
                bottom: 0;
                z-index: -1;
            }

            .blog-card.alt {
                flex-direction: row-reverse;
            }

            .blog-card.alt .description:before {
                left: inherit;
                right: -10px;
                -webkit-transform: skew(3deg);
                transform: skew(3deg);
            }

            .blog-card.alt .details {
                padding-left: 25px;
            }
        }
    </style>
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        @if (app()->getLocale() == 'fr')
            <div class="parallax">
                <div class="breadcrumbs" data-aos="fade-in">
                    <div class="container">
                        <h2>@lang('messages.Les annonces de AMDD')</h2>
                    </div>
                </div><!-- End Breadcrumbs -->
            </div><!-- End Parallax -->
        @elseif (app()->getLocale() == 'ar')
            <div class="parallax">
                <div class="breadcrumbs" data-aos="fade-in">
                    <div class="container">
                        <h2>@lang('messages.Les annonces de AMDD')</h2>
                    </div>
                </div><!-- End Breadcrumbs -->
            </div><!-- End Parallax -->
        @endif
        <!-- ======= Events Section ======= -->
        <section id="appointment" class="appointment section-bg" style="padding: 141px 0;">
            @if (app()->getLocale() == 'ar')
                <div class="container" data-aos="fade-up" dir="rtl">
                    <div class="section-title">
                        <h2>@lang("messages.Les annonces de l'association")</h2>
                    </div>
                    @foreach ($annonces as $annonce)
                        <div class="blog-card">
                            <div class="meta">
                                <div class="photo"
                                    style="background-image: url({{ asset('frontend/img/annonceivités/' . $annonce->image) }})">
                                </div>
                                <ul class="details"></ul>
                            </div>
                            <div class="description">
                                <h1>{{ Str::limit($annonce->titre_annonce_ar, 100, $end = '.....') }}</h1>
                                <p> {{ Str::limit($annonce->description_annonce_ar, 250, $end = '.....') }}</p>
                                <p class="read-more">
                                    <a style="display:block;"
                                        href="{{ route('frontend.show', ['id' => $annonce->id]) }}">@lang('messages.Lire la suite')</a>
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @elseif (app()->getLocale() == 'fr')
                <div class="container" data-aos="fade-up">
                    <div class="section-title">
                        <h2>@lang('messages.Les annonces de l\'association')</h2>
                    </div>
                    @foreach ($annonces as $annonce)
                        <div class="blog-card">
                            <div class="meta">
                                <div class="photo" {{ Storage::url($annonce->image_annonce) }}
                                    style="background-image: url({{ Storage::url($annonce->image_annonce) }})">
                                </div>
                                <ul class="details"></ul>
                            </div>
                            <div class="description">
                                <h1>{{ Str::limit($annonce->titre_annonce_fr, 100, $end = '.....') }}</h1>
                                <p> {{ Str::limit($annonce->description_annonce_ar, 250, $end = '.....') }}</p>
                                <p class="read-more">
                                    <a style="display:block;"
                                        href="{{ route('frontend.show', ['id' => $annonce->id]) }}">@lang('messages.Lire la suite')</a>
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
            <div class="container" data-aos="fade-up" style=" margin-left: 42%; margin-top: 4%;">
                {{ $annonces->links() }}
            </div>
        </section><!-- End Entreprenariat Section -->
        <!-- End Events Section -->
    </main><!-- End #main -->
@endsection
