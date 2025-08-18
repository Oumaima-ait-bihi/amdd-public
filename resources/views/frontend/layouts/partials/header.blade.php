<!-- ======= Header ======= -->
<header id="header" class="fixed-top w-100">
    @if (app()->getLocale() == 'ar')
        <div class="header2 d-flex align-items-center" dir="rtl">
            <div class="logo">
                <a href="{{ route('frontend.home') }}" class="logo-img"><img
                        src="{{ asset('frontend/img/logo-amdd.png') }}" alt="" class="logo1 img-fluid"></a>
            </div>
            <!-- Uncomment below if you prefer to use an image logo -->
            <div class="navBtn">
                <nav id="navbar" class="navbar order-last order-lg-0">
                    <ul>
                        <li><a class="{{ request()->is('/') ? 'active' : '' }}"
                                href="{{ route('frontend.home') }}">@lang('messages.Acceuil')</a></li>
                        <li><a class="{{ request()->is('association') ? 'active' : '' }}"
                                href="{{ route('frontend.association') }}">@lang('messages.Association AMDD')</a></li>
                        <li><a class="{{ request()->is('events') ? 'active' : '' }}"
                                href="{{ route('frontend.events') }}">@lang('messages.Evénements')</a></li>
                        <li><a class="{{ request()->is('annonces') ? 'active' : '' }}"
                                href="{{ route('frontend.annonces') }}">@lang('messages.Annonces')</a></li>
                        <li><a class="{{ request()->is('activités') ? 'active' : '' }}"
                                href="{{ route('frontend.activites') }}">@lang('messages.Activités')</a></li>
                        <li><a class="{{ request()->is('organigramme') ? 'active' : '' }}"
                                href="{{ route('organigramme') }}">@lang('messages.Organigramme AMDD')</a></li>
                        <li><a class="{{ request()->is('contact') ? 'active' : '' }}"
                                href="{{ route('frontend.contact') }}">@lang('messages.Contact')</a></li>
                                <li><a class="{{ request()->is('espace-membre') ? 'active' : '' }}"
                                    href="{{ route('frontend.espace-membre') }}">@lang('messages.membre')</a></li>
                        <li class="dropdown {{ request()->is('') ? 'active' : '' }}"><a
                                href="#"><span>@lang('messages.Langue')</span> <i class="bi bi-chevron-down"></i></a>
                            <ul>
                                <li><a href="{{ URL('/?lang=ar') }}" id="lang_ar">@lang('messages.Arabe')</a></li>
                                <li><a href="{{ URL('/?lang=fr') }}" id="lang_fr">@lang('messages.Français')</a></li>
                            </ul>
                        </li>
                    </ul>
                    <i class="bi icon bi-list mobile-nav-toggle"></i>
                </nav><!-- .navbar -->
                <a href="{{ route('frontend.adhesion') }}" class="get-started-btn">@lang('messages.Adhesion')</a>
            </div>
        </div>
    @elseif (app()->getLocale() == 'fr')
        <div class="header2 d-flex align-items-center">
            <div class="logo">
                <a href="{{ route('frontend.home') }}" class="logo-img "><img
                        src="{{ asset('frontend/img/logo-amdd.png') }}" alt="" class="logo1 img-fluid"></a>
            </div>
            <!-- Uncomment below if you prefer to use an image logo -->
            <div class="navBtn">
                <nav id="navbar" class="navbar order-last order-lg-0">
                    <ul>
                        <li><a class="{{ request()->is('/') ? 'active' : '' }}"
                                href="{{ route('frontend.home') }}">@lang('messages.Acceuil')</a></li>
                        <li><a class="{{ request()->is('association') ? 'active' : '' }}"
                                href="{{ route('frontend.association') }}">@lang('messages.Association AMDD')</a></li>
                        <li><a class="{{ request()->is('events') ? 'active' : '' }}"
                                href="{{ route('frontend.events') }}">@lang('messages.Evénements')</a></li>
                                <li><a class="{{ request()->is('annonces') ? 'active' : '' }}"
                                    href="{{ route('frontend.annonces') }}">@lang('messages.Annonces')</a></li>
                        <li><a class="{{ request()->is('activités') ? 'active' : '' }}"
                                href="{{ route('frontend.activites') }}">@lang('messages.Activités')</a></li>
                        <li><a class="{{ request()->is('organigramme') ? 'active' : '' }}"
                                href="{{ route('organigramme') }}">@lang('messages.Organigramme AMDD')</a></li>
                        <li><a class="{{ request()->is('contact') ? 'active' : '' }}"
                                href="{{ route('frontend.contact') }}">@lang('messages.Contact')</a></li>
                                <li><a class="{{ request()->is('espace-membre') ? 'active' : '' }}"
                                    href="{{ route('frontend.espace-membre') }}">@lang('messages.membre')</a></li>


                        <li class="dropdown {{ request()->is('') ? 'active' : '' }}"><a
                                href="#"><span>@lang('messages.Langue')</span> <i class="bi bi-chevron-down"></i></a>
                            <ul>
                                <li><a href="{{ URL('/?lang=ar') }}" id="lang_ar">@lang('messages.Arabe')</a></li>
                                <li><a href="{{ URL('/?lang=fr') }}" id="lang_fr">@lang('messages.Français')</a></li>
                            </ul>
                        </li>
                    </ul>
                    <i class="bi icon bi-list mobile-nav-toggle"></i>
                </nav><!-- .navbar -->
                <a href="{{ route('frontend.adhesion') }}" class="get-started-btn">@lang('messages.Adhesion')</a>
            </div>
        </div>
    @endif
    {{--  the blue point --}}
    <div id='point'></div>
</header><!-- End Header -->
@include('frontend.layouts.partials.socialmedia')
