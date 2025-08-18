@extends('frontend.layouts.app')

@section('title')
    <title>Vérification certificat | AMDD</title>
@endsection

@section('content')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;500&family=Tajawal&display=swap');

        .parallax {
            background-image: url('{{ asset('frontend/img/hero1.jpg') }}');
            background-size: cover;
            background-repeat: no-repeat;
        }

        .breadcrumbs {
            background: rgba(0, 0, 0, 0.4) url('{{ asset('frontend/img/pattern.png') }}') repeat;
            padding: 90px 0;
            text-align: center;
        }

        .certificate-card {
            background: #fff;
            padding: 30px;
            margin: 20px auto;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            max-width: 700px;
            border: 3px solid #3c78b9;
            text-align: center;
        }

        .form-group label {
            font-weight: bold;
            display: inline-block;
            margin-bottom: 10px;
        }

        .form-group input {
            display: block;
            margin: 0 auto;
            width: 145%;
            max-width: 400px;
            padding: 12px;
            font-size: 16px;
            border: 2px solid #3c78b9;
            border-radius: 8px;
            box-sizing: border-box;
        }

        .btn {
            margin-top: 20px;
            padding: 12px 20px;
            font-size: 16px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .arabic {
            direction: rtl;
            font-family: 'Tajawal', sans-serif;
            text-align: right;
        }

        .details {
            text-align: left;
            margin-top: 20px;
        }

        @media (max-width: 768px) {
            .certificate-card {
                padding: 20px;
                margin: 10px;
            }

            .form-group label,
            .form-group input {
                font-size: 14px;
            }

            .btn {
                font-size: 14px;
            }
        }
    </style>

    <main id="main">
        <div class="parallax">
            <div class="breadcrumbs" data-aos="fade-in">
                <div class="container">
                    <h2>@lang('messages.Association Maroccaine De Développement Digital (AMDD)')</h2>
                </div>
            </div>
        </div>

        <section id="about" class="about">
            <div class="container" data-aos="fade-up" dir="rtl">
                <!-- Certificate Form -->
                <div class="certificate-card">
                    <form action="{{ route('certificates.verify') }}" method="get">
                        <div class="form-group" style="    text-align: center !important; margin-right: 20%;">
                            <label for="code">Certificate Code / رمز الشهادة</label>
                            <input type="text" id="code" name="code"
                                placeholder="Enter certificate code / أدخل رمز الشهادة" value="{{ request('code') }}">
                        </div>
                        <button type="submit" class="btn">تحقق / Verify</button>
                    </form>
                </div>

                <!-- Certificate Result -->
                @isset($isValid)
                    <div class="certificate-card">
                        @if ($isValid)
                            <h2 class="valid text-success" style="font-family: 'Tajawal', sans-serif;">الشهادة صالحة</h2>
                            <p class="arabic"><strong>اسم المستلم:</strong> {{ $certificate->recipient_name_ar }}</p>
                            <p class="arabic"><strong>عنوان الورشة:</strong> {{ $certificate->workshop_title_ar }}</p>
                            <p class="arabic"><strong>التاريخ:</strong> {{ $certificate->workshop_date }}</p>
                            <p class="arabic"><strong>المدة:</strong> {{ $certificate->duration }} ساعة</p>
                            <p class="arabic"><strong>رمز الشهادة:</strong> {{ $certificate->certificate_code }}</p>
                            <hr>
                            <h2 class="valid text-success">Certificate is Valid</h2>
                            <div class="details">
                                <p><strong>Recipient Name:</strong> {{ $certificate->recipient_name_fr }}</p>
                                <p><strong>Workshop Title:</strong> {{ $certificate->workshop_title_en }}</p>
                                <p><strong>Date:</strong> {{ $certificate->workshop_date }}</p>
                                <p><strong>Duration:</strong> {{ $certificate->duration }} hours</p>
                                <p><strong>Certificate Code:</strong> {{ $certificate->certificate_code }}</p>
                            </div>
                        @else
                            <h2 class="invalid text-danger" style="font-family: 'Tajawal', sans-serif;">الشهادة غير صالحة</h2>
                            <p style="font-family: 'Tajawal', sans-serif;">رمز الشهادة الذي أدخلته غير صالح. يرجى التحقق من
                                الرمز والمحاولة مرة أخرى.</p>
                            <hr>
                            <h2 class="text-danger">Certificate is Invalid</h2>
                            <p>The certificate code you entered is not valid. Please check the code and try again.</p>
                        @endif
                    </div>
                @endisset
            </div>
        </section>
    </main>
@endsection
@section('scripts')
    <script>
        // Add any additional JavaScript here if needed
    </script>
@endsection