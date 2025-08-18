@extends('frontend.layouts.app')
@section('title')
    <title>Contact | AMDD</title>
@endsection
@section('content')
    <style>
        .parallax {
            background-image: url(../frontend/img/contactus.jpg);
            background-repeat: no-repeat;
            background-size: cover;
            opacity: inherit;
        }

        .breadcrumbs {
            background: rgba(0, 0, 0, 0.4) url(../frontend/img/pattern.png) repeat;
            padding: 91px 0;
        }

        .text-center {
            padding: 10px;
        }

        .form-control textarea {
            width: 100% !important;
            padding: 10px !important;
            border-radius: 5px !important;
        }

        form input,
        form textarea {
            border: 1px solid #ccc;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
            width: 100%;
        }

        form button {
            padding: 10px;
            width: 100%;
            background-color: #0080C9;
            border-radius: 3px;
            color: white;
            font-size: medium;
            border: 1px solid #0080C9;
            transition: 0.3s ease-in-out;
            cursor: pointer;
        }

        form button:hover {
            background-color: white;
            color: #0080C9;
        }

        @media (max-width: 500px) {
            form button {
                width: 100%;
            }
        }

        .email-heading {
            text-align: center;
            margin: 20px 0;
            font-size: 1.8rem;
            color: #333;
            font-weight: bold;
        }
    </style>
    <main id="main">
        <!-- ======= Breadcrumbs ======= -->
        @if (app()->getLocale() == 'ar')
            <div class="parallax">
                <div class="breadcrumbs" data-aos="fade-in">
                    <div class="container">
                        <h2>@lang('messages.Nous contacter')</h2>
                        <p>@lang('messages.Vous pouvez nous trouver facilement grâce à ces différentes coordonnées là où vous vous trouvez dans le monde, vous êtes les bienvenus')</p>
                    </div>
                </div><!-- End Breadcrumbs -->
            </div>
        @elseif (app()->getLocale() == 'fr')
            <div class="parallax">
                <div class="breadcrumbs" data-aos="fade-in">
                    <div class="container">
                        <h2>@lang('messages.Nous contacter')</h2>
                        <p>@lang('messages.Vous pouvez nous trouver facilement grâce à ces différentes coordonnées là où vous vous trouvez dans le monde, vous êtes les bienvenus')</p>
                    </div>
                </div><!-- End Breadcrumbs -->
            </div>
        @endif

        <!-- ======= Email Heading ======= -->
        <div class="email-heading">ENVOYER-NOUS UN EMAIL</div>

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container" style="max-width: 1200px; margin: auto; padding: 20px;">
                <div class="row">
                    <!-- Left Side: Google Map -->
                    <div class="col-lg-6">
                        <iframe style="border:0; width: 100%; height: 442px;"
                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3324.8103637676722!2d-7.5767354!3d33.5583031!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xda632d6d7dc86b9%3A0xa336adae0ee9cb9a!2sCentre%20culturel%20KAMAL%20ZEBDI!5e0!3m2!1sen!2sma!4v1684760501756!5m2!1sen!2sma"
                            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>

                    <!-- Right Side: Contact Form -->
                    <div class="col-lg-6">
                        <div class="info">
                            <p><strong>Adress:</strong> Centre Cultural Kamal Zebdi, Casablanca</p>
                            <p><strong>Phone:</strong> +212 760-122146</p>
                        </div>

                        <form method="POST" action="{{ route('contact.mail') }}" id="form" style="margin-top: 20px;">
                            {{ csrf_field() }}

                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <input type="text" name="name" class="form-control" placeholder="Nom" required>
                                </div>
                                <div class="col-md-6 form-group">
                                    <input type="text" name="surname" class="form-control" placeholder="Prénom" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <input type="email" class="form-control" name="email" placeholder="Email" required>
                                </div>

                                <div class="col-md-6 form-group">
                                    <input type="text" class="form-control" name="subject" placeholder="Sujet" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <textarea class="form-control" name="message" rows="7" placeholder="Your message here..." required
                                    style="width: 199%;"></textarea>
                            </div>

                            <div class="text-center">
                                <button type="submit">ENVOYER</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </main><!-- End #main -->
    <script defer>
        let form = document.getElementById('form');
        form.addEventListener("submit", (event) => {
            // console.log('Form submitted');
            Swal.fire(
                'Merci de nous contacter!',
                'Votre message sera envoyé dès que possible',
                'success'
            );
        });
    </script>
@endsection
