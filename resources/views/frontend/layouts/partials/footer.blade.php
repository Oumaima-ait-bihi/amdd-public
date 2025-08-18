<footer class="footer-section">
    @if (app()->getLocale() == 'ar')
        <div class="container" dir="rtl">
            <div class="footer-cta pt-5 pb-5">
                <div class="row">
                    <div class="col-xl-4 col-md-4 mb-30">
                        <div class="single-cta">
                            <div class="containerIcon">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                                </svg>
                            </div>
                            <div class="cta-text">
                                <h4>@lang('messages.Trouvez-nous')</h4>
                                <span>@lang('messages.Quartier Sbata, Casablanca, Maroc')</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-4 mb-30">
                        <div class="single-cta">
                            <div class="containerIcon">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                                </svg>
                            </div>
                            <div class="cta-text">
                                <h4>@lang('messages.Téléphone')</h4>
                                <span>760-122146 212+</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-4 mb-30">
                        <div class="single-cta">
                            <div class="containerIcon">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 3.75H6.912a2.25 2.25 0 0 0-2.15 1.588L2.35 13.177a2.25 2.25 0 0 0-.1.661V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18v-4.162c0-.224-.034-.447-.1-.661L19.24 5.338a2.25 2.25 0 0 0-2.15-1.588H15M2.25 13.5h3.86a2.25 2.25 0 0 1 2.012 1.244l.256.512a2.25 2.25 0 0 0 2.013 1.244h3.218a2.25 2.25 0 0 0 2.013-1.244l.256-.512a2.25 2.25 0 0 1 2.013-1.244h3.859M12 3v8.25m0 0-3-3m3 3 3-3" />
                                </svg>

                            </div>
                            <div class="cta-text">
                                <h4>@lang('messages.Email')</h4>
                                <span>direction.amdd@gmail.com</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-content pt-5 pb-5">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 mb-50">
                        <div class="footer-widget">
                            <div class="footer-logo">
                                <a href="index.html"><img src="{{ asset('frontend/img/logo-amdd1.png') }}"
                                        class="img-fluid" alt="logo"></a>
                            </div>
                            <div class="footer-text">
                                <p>@lang('messages.association')</p>
                            </div>
                            <div class="footer-social-icon">
                                <span>@lang('messages.Suivez-nous')</span>
                                <a href="#" class='facebook-bg'><svg width="32" height="32"
                                        viewBox="0 0 24 24" stroke="white" fill="none" stroke-linejoin="round"
                                        stroke-width="1.125" stroke-linecap="round" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M3 12.0452C3 16.1081 5.70534 19.5379 9.40044 20.7126C9.99428 20.9014 10.5605 20.4272 10.5605 19.8041V15.0778C10.5605 14.8017 10.3367 14.5778 10.0605 14.5778H8.81055C8.5344 14.5778 8.31055 14.354 8.31055 14.0778V12.5451C8.31055 12.269 8.5344 12.0451 8.81055 12.0451H10.0605C10.3367 12.0451 10.5605 11.8213 10.5605 11.5451V10.0552C10.5605 7.79389 12.0005 6.52756 14.0705 6.52756C14.5612 6.52756 15.1065 6.58243 15.6213 6.64943C15.8679 6.68152 16.0505 6.89311 16.0505 7.1418V8.515C16.0505 8.79114 15.8267 9.015 15.5505 9.015H14.8805C13.8005 9.015 13.5305 9.55771 13.5305 10.2813V11.5451C13.5305 11.8213 13.7544 12.0451 14.0305 12.0451H15.3292C15.6369 12.0451 15.8715 12.3203 15.823 12.6241L15.5779 14.1568C15.5391 14.3993 15.3298 14.5778 15.0841 14.5778H14.0282C13.753 14.5778 13.5295 14.8002 13.5282 15.0754L13.5057 19.7983C13.5027 20.4234 14.0701 20.9007 14.6655 20.7104C18.3478 19.5336 21 16.1056 21 12.0452C21 7.07035 16.95 3 12 3C7.05 3 3 7.07035 3 12.0452Z">
                                        </path>
                                    </svg></i></a>
                                <a href="#" class='twitter-bg'><svg width="32" height="32"
                                        viewBox="0 0 24 24" stroke="white" fill="none" stroke-linejoin="round"
                                        stroke-width="1.125" stroke-linecap="round" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M19.6667 3.00124H4.3282C3.60819 2.99311 3.00878 3.57859 3 4.29861V19.7008C3.00845 20.4213 3.60778 21.0074 4.3282 20.9997H19.6667C20.3889 21.0088 20.9903 20.4227 21 19.7008V4.29756C20.9903 3.57601 20.3881 2.99061 19.6667 3.00011M18.3372 18.3371H15.67V14.1603C15.67 13.1642 15.6523 11.8821 14.2829 11.8821C12.8938 11.8821 12.6812 12.9672 12.6812 14.0877V18.3367H10.0142V9.74757H12.5745V10.9213H12.6104C13.1318 10.03 14.1047 9.49565 15.1367 9.53397C17.8398 9.53397 18.3383 11.312 18.3383 13.6252L18.3372 18.3371ZM7.00481 8.57346C6.15574 8.57346 5.45673 7.87486 5.45673 7.02579C5.45673 6.17671 6.15541 5.47803 7.00449 5.47803C7.85348 5.47803 8.55208 6.17655 8.55225 7.02546C8.55225 7.87438 7.85373 8.57338 7.00481 8.57346ZM8.33833 18.3371H5.66848V9.74757H8.33833V18.3371Z">
                                        </path>
                                    </svg></a>
                                <a href="#" class='google-bg'><svg width="32" height="32"
                                        viewBox="0 0 24 24" stroke="white" fill="none" stroke-linejoin="round"
                                        stroke-width="1.125" stroke-linecap="round" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M17.8463 5H6.15374C3.85969 5 2 6.83965 2 9.10898V14.891C2 17.1603 3.85969 19 6.15374 19H17.8463C20.1403 19 22 17.1603 22 14.891V9.10898C22 6.83965 20.1403 5 17.8463 5ZM15.0371 12.2813L9.56814 14.8616C9.42241 14.9303 9.25408 14.8252 9.25408 14.6655V9.34374C9.25408 9.18177 9.42684 9.0768 9.57287 9.15001L15.0418 11.8916C15.2044 11.973 15.2016 12.2037 15.0371 12.2813Z">
                                        </path>
                                    </svg></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 mb-30">
                        <div class="footer-widget">
                            <div class="footer-widget-heading">
                                <h3>@lang('messages.Liens utiles')</h3>
                            </div>
                            <ul>
                                <li><a href="{{ route('frontend.home') }}">@lang('messages.Acceuil')</a></li>
                                <li><a href="{{ route('frontend.association') }}">@lang('messages.Association AMDD')</a></li>
                                <li><a href="{{ route('frontend.events') }}">@lang('messages.Evénements')</a></li>
                                <li><a href="{{ route('frontend.activites') }}">@lang('messages.Activités')</a></li>
                                <li><a href="{{ route('organigramme') }}">@lang('messages.Organigramme AMDD')</a></li>
                                <li> <a href="{{ route('frontend.contact') }}">@lang('messages.Contact')</a></li>

                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 mb-50">
                        <div class="footer-widget">
                            <div class="footer-widget-heading">
                                <h3>@lang('messages.Abonner')</h3>
                            </div>
                            <div class="footer-text mb-25">
                                <p>@lang("messages.Ne_manquez")</p>
                            </div>
                            <div class="subscribe-form">
                                <form action="#">
                                    <input type="text" placeholder="Email Address">
                                    <button>
                                        <svg width="32" height="32" viewBox="0 0 24 24" stroke="white"
                                            fill="none" stroke-linejoin="round" stroke-width="1.125"
                                            stroke-linecap="round" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10 8L14 12L10 16"></path>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @elseif(app()->getLocale() == 'fr')
    <div class="container">
        <div class="footer-cta pt-5 pb-5">
            <div class="row">
                <div class="col-xl-4 col-md-4 mb-30">
                    <div class="single-cta">
                        <div class="containerIcon">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                            </svg>
                        </div>
                        <div class="cta-text">
                            <h4>@lang('messages.Trouvez-nous')</h4>
                            <span>@lang('messages.Quartier Sbata, Casablanca, Maroc')</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4 mb-30">
                    <div class="single-cta">
                        <div class="containerIcon">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                            </svg>
                        </div>
                        <div class="cta-text">
                            <h4>@lang('messages.Téléphone')</h4>
                            <span>760-122146 212+</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4 mb-30">
                    <div class="single-cta">
                        <div class="containerIcon">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 3.75H6.912a2.25 2.25 0 0 0-2.15 1.588L2.35 13.177a2.25 2.25 0 0 0-.1.661V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18v-4.162c0-.224-.034-.447-.1-.661L19.24 5.338a2.25 2.25 0 0 0-2.15-1.588H15M2.25 13.5h3.86a2.25 2.25 0 0 1 2.012 1.244l.256.512a2.25 2.25 0 0 0 2.013 1.244h3.218a2.25 2.25 0 0 0 2.013-1.244l.256-.512a2.25 2.25 0 0 1 2.013-1.244h3.859M12 3v8.25m0 0-3-3m3 3 3-3" />
                            </svg>

                        </div>
                        <div class="cta-text">
                            <h4>@lang('messages.Email')</h4>
                            <span>direction.amdd@gmail.com</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-content pt-5 pb-5">
            <div class="row">
                <div class="col-xl-4 col-lg-4 mb-50">
                    <div class="footer-widget">
                        <div class="footer-logo">
                            <a href="index.html"><img src="{{ asset('frontend/img/logo-amdd1.png') }}"
                                    class="img-fluid" alt="logo"></a>
                        </div>
                        <div class="footer-text">
                            <p>@lang('messages.association')</p>
                        </div>
                        <div class="footer-social-icon">
                            <span>@lang('messages.Suivez-nous')</span>
                            <a href="#" class='facebook-bg'><svg width="32" height="32"
                                    viewBox="0 0 24 24" stroke="white" fill="none" stroke-linejoin="round"
                                    stroke-width="1.125" stroke-linecap="round" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M3 12.0452C3 16.1081 5.70534 19.5379 9.40044 20.7126C9.99428 20.9014 10.5605 20.4272 10.5605 19.8041V15.0778C10.5605 14.8017 10.3367 14.5778 10.0605 14.5778H8.81055C8.5344 14.5778 8.31055 14.354 8.31055 14.0778V12.5451C8.31055 12.269 8.5344 12.0451 8.81055 12.0451H10.0605C10.3367 12.0451 10.5605 11.8213 10.5605 11.5451V10.0552C10.5605 7.79389 12.0005 6.52756 14.0705 6.52756C14.5612 6.52756 15.1065 6.58243 15.6213 6.64943C15.8679 6.68152 16.0505 6.89311 16.0505 7.1418V8.515C16.0505 8.79114 15.8267 9.015 15.5505 9.015H14.8805C13.8005 9.015 13.5305 9.55771 13.5305 10.2813V11.5451C13.5305 11.8213 13.7544 12.0451 14.0305 12.0451H15.3292C15.6369 12.0451 15.8715 12.3203 15.823 12.6241L15.5779 14.1568C15.5391 14.3993 15.3298 14.5778 15.0841 14.5778H14.0282C13.753 14.5778 13.5295 14.8002 13.5282 15.0754L13.5057 19.7983C13.5027 20.4234 14.0701 20.9007 14.6655 20.7104C18.3478 19.5336 21 16.1056 21 12.0452C21 7.07035 16.95 3 12 3C7.05 3 3 7.07035 3 12.0452Z">
                                    </path>
                                </svg></i></a>
                            <a href="#" class='twitter-bg'><svg width="32" height="32"
                                    viewBox="0 0 24 24" stroke="white" fill="none" stroke-linejoin="round"
                                    stroke-width="1.125" stroke-linecap="round" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M19.6667 3.00124H4.3282C3.60819 2.99311 3.00878 3.57859 3 4.29861V19.7008C3.00845 20.4213 3.60778 21.0074 4.3282 20.9997H19.6667C20.3889 21.0088 20.9903 20.4227 21 19.7008V4.29756C20.9903 3.57601 20.3881 2.99061 19.6667 3.00011M18.3372 18.3371H15.67V14.1603C15.67 13.1642 15.6523 11.8821 14.2829 11.8821C12.8938 11.8821 12.6812 12.9672 12.6812 14.0877V18.3367H10.0142V9.74757H12.5745V10.9213H12.6104C13.1318 10.03 14.1047 9.49565 15.1367 9.53397C17.8398 9.53397 18.3383 11.312 18.3383 13.6252L18.3372 18.3371ZM7.00481 8.57346C6.15574 8.57346 5.45673 7.87486 5.45673 7.02579C5.45673 6.17671 6.15541 5.47803 7.00449 5.47803C7.85348 5.47803 8.55208 6.17655 8.55225 7.02546C8.55225 7.87438 7.85373 8.57338 7.00481 8.57346ZM8.33833 18.3371H5.66848V9.74757H8.33833V18.3371Z">
                                    </path>
                                </svg></a>
                            <a href="#" class='google-bg'><svg width="32" height="32"
                                    viewBox="0 0 24 24" stroke="white" fill="none" stroke-linejoin="round"
                                    stroke-width="1.125" stroke-linecap="round" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M17.8463 5H6.15374C3.85969 5 2 6.83965 2 9.10898V14.891C2 17.1603 3.85969 19 6.15374 19H17.8463C20.1403 19 22 17.1603 22 14.891V9.10898C22 6.83965 20.1403 5 17.8463 5ZM15.0371 12.2813L9.56814 14.8616C9.42241 14.9303 9.25408 14.8252 9.25408 14.6655V9.34374C9.25408 9.18177 9.42684 9.0768 9.57287 9.15001L15.0418 11.8916C15.2044 11.973 15.2016 12.2037 15.0371 12.2813Z">
                                    </path>
                                </svg></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 mb-30">
                    <div class="footer-widget">
                        <div class="footer-widget-heading">
                            <h3>@lang('messages.Liens utiles')</h3>
                        </div>
                        <ul>
                            <li><a href="{{ route('frontend.home') }}">@lang('messages.Acceuil')</a></li>
                            <li><a href="{{ route('frontend.association') }}">@lang('messages.Association AMDD')</a></li>
                            <li><a href="{{ route('frontend.events') }}">@lang('messages.Evénements')</a></li>
                            <li><a href="{{ route('frontend.activites') }}">@lang('messages.Activités')</a></li>
                            <li><a href="{{ route('organigramme') }}">@lang('messages.Organigramme AMDD')</a></li>
                            <li> <a href="{{ route('frontend.contact') }}">@lang('messages.Contact')</a></li>

                        </ul>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 mb-50">
                    <div class="footer-widget">
                        <div class="footer-widget-heading">
                            <h3>@lang('messages.Abonner')</h3>
                        </div>
                        <div class="footer-text mb-25">
                            <p>@lang("messages.Ne_manquez")</p>
                        </div>
                        <div class="subscribe-form">
                            <form action="#">
                                <input type="text" placeholder="Email Address">
                                <button>
                                    <svg width="32" height="32" viewBox="0 0 24 24" stroke="white"
                                        fill="none" stroke-linejoin="round" stroke-width="1.125"
                                        stroke-linecap="round" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10 8L14 12L10 16"></path>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    <div class="copyright-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 text-center text-lg-left">
                    <div class="copyright-text">
                        <p>Copyright &copy; 2025, All Right Reserved <strong><span>Amdd</span></strong></p>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 d-none d-lg-block text-right">
                    <div class="footer-menu">
                        <div class="social-links mt-3">
                            <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                            <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                            <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                            <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<style>
	/* Styles pour le bouton de chat */
	#chatBot {
		position: fixed !important;
		bottom: 110px !important;
		right: 30px !important;
		width: 60px !important;
		height: 60px !important;
		background: linear-gradient(135deg, #005daa, #0089e0) !important; /* Dégradé moderne */
		border: none !important;
		border-radius: 50% !important;
		color: white !important;
		font-size: 24px !important;
		cursor: pointer !important;
		box-shadow: 0 5px 20px rgba(0, 93, 170, 0.4) !important; /* Ombre plus prononcée */
		z-index: 999999 !important;
		display: flex !important;
		align-items: center !important;
		justify-content: center !important;
		transition: all 0.3s ease !important;
		animation: pulse 2s infinite !important; /* Animation de pulsation */
	}

	#chatBot:hover {
		transform: scale(1.1) !important;
		box-shadow: 0 6px 25px rgba(0, 93, 170, 0.4) !important;
	}
#chatBot {
    position: fixed !important;
    bottom: 110px !important;
    right: 30px !important;
    width: 60px !important;
    height: 60px !important;
    background: linear-gradient(135deg, #005daa, #0089e0) !important; /* Dégradé moderne */
    border: none !important;
    border-radius: 50% !important;
    color: white !important;
    font-size: 24px !important;
    cursor: pointer !important;
    box-shadow: 0 5px 20px rgba(0, 93, 170, 0.4) !important; /* Ombre plus prononcée */
    z-index: 999999 !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    transition: all 0.3s ease !important;
    animation: pulse 2s infinite !important; /* Animation de pulsation */
}

#chatBot:hover {
    transform: scale(1.1) !important;
    box-shadow: 0 6px 25px rgba(0, 93, 170, 0.4) !important;
}

#chatWindow {
    position: fixed !important;
    bottom: 180px !important; 
    right: 30px !important;
    width: 380px !important;
    height: 520px !important;
    background: white !important;
    border-radius: 15px !important;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15) !important;
    display: none !important;
    flex-direction: column !important;
    z-index: 999998 !important;
    overflow: hidden !important;
    border: 1px solid rgba(0, 93, 170, 0.2) !important;
}

#chatWindow.show {
    display: flex !important;
    animation: fadeIn 0.3s ease-in-out !important;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}

.chat-header {
    background: #005daa !important; /* Couleur principale de l'AMDD */
    padding: 18px 20px !important;
    color: white !important;
    display: flex !important;
    justify-content: space-between !important;
    align-items: center !important;
    border-radius: 15px 15px 0 0 !important;
}

.chat-title {
    font-size: 18px !important;
    font-weight: 600 !important;
    display: flex !important;
    align-items: center !important;
    gap: 10px !important;
}

.chat-title img {
    width: 24px !important;
    height: 24px !important;
    border-radius: 50% !important;
}

.chat-close {
    background: rgba(255, 255, 255, 0.1) !important;
    border: none !important;
    color: white !important;
    font-size: 20px !important;
    cursor: pointer !important;
    padding: 5px !important;
    border-radius: 50% !important;
    width: 28px !important;
    height: 28px !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    transition: all 0.2s ease !important;
}

.chat-close:hover {
    background-color: rgba(255, 255, 255, 0.2) !important;
    transform: rotate(90deg) !important;
}

.chat-messages {
    flex: 1 !important;
    padding: 20px !important;
    overflow-y: auto !important;
    background: #f7f9fc !important;
}

.welcome-msg {
    text-align: center !important;
    color: #333 !important;
    margin-bottom: 20px !important;
    background: white !important;
    padding: 20px !important;
    border-radius: 12px !important;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05) !important;
}

.welcome-msg h3 {
    color: #005daa !important;
    margin-bottom: 10px !important;
    font-size: 18px !important;
}

.welcome-msg p {
    color: #555 !important;
    font-size: 14px !important;
    margin-bottom: 15px !important;
}

.quick-btns {
    display: flex !important;
    flex-wrap: wrap !important;
    gap: 8px !important;
    justify-content: center !important;
}

.quick-btn {
    background: white !important;
    color: #005daa !important;
    border: 1px solid #005daa !important;
    padding: 8px 15px !important;
    border-radius: 20px !important;
    font-size: 13px !important;
    cursor: pointer !important;
    transition: all 0.3s ease !important;
}

.quick-btn:hover {
    background: #005daa !important;
    color: white !important;
    transform: translateY(-2px) !important;
    box-shadow: 0 3px 10px rgba(0, 93, 170, 0.2) !important;
}

.chat-input {
    padding: 15px 20px !important;
    background: white !important;
    border-top: 1px solid #eaedf3 !important;
    border-radius: 0 0 15px 15px !important;
}

.input-group {
    display: flex !important;
    gap: 10px !important;
    align-items: center !important;
}

#messageInput {
    flex: 1 !important;
    padding: 12px 16px !important;
    border: 1px solid #e2e8f0 !important;
    border-radius: 25px !important;
    outline: none !important;
    font-size: 14px !important;
    resize: none !important;
    min-height: 44px !important;
    max-height: 80px !important;
    font-family: inherit !important;
    transition: border-color 0.3s ease, box-shadow 0.3s ease !important;
}

#messageInput:focus {
    border-color: #005daa !important;
    box-shadow: 0 0 0 3px rgba(0, 93, 170, 0.1) !important;
}

#sendBtn {
    width: 44px !important;
    height: 44px !important;
    background: #005daa !important;
    border: none !important;
    border-radius: 50% !important;
    color: white !important;
    font-size: 16px !important;
    cursor: pointer !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    transition: all 0.3s ease !important;
}

#sendBtn:hover {
    transform: scale(1.05) !important;
    background: #0069c0 !important;
    box-shadow: 0 4px 12px rgba(0, 93, 170, 0.3) !important;
}

.message {
    margin-bottom: 15px !important;
    display: flex !important;
    align-items: flex-start !important;
    gap: 10px !important;
}

.user-message {
    justify-content: flex-end !important;
}

.bot-message {
    justify-content: flex-start !important;
}

.message-content {
    padding: 12px 16px !important;
    border-radius: 18px !important;
    max-width: 250px !important;
    word-wrap: break-word !important;
    line-height: 1.4 !important;
    animation: messageAppear 0.3s ease-out !important;
}

@keyframes messageAppear {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
}

.user-message .message-content {
    background: #005daa !important;
    color: white !important;
    border-bottom-right-radius: 4px !important;
}

.bot-message .message-content {
    background: white !important;
    color: #333 !important;
    border: 1px solid #e2e8f0 !important;
    border-bottom-left-radius: 4px !important;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05) !important;
}

.bot-avatar {
    width: 36px !important;
    height: 36px !important;
    background: #005daa !important;
    border-radius: 50% !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    color: white !important;
    font-size: 16px !important;
    flex-shrink: 0 !important;
    box-shadow: 0 2px 5px rgba(0, 93, 170, 0.2) !important;
}

.footer-text {
    text-align: center !important;
    padding: 8px !important;
    font-size: 12px !important;
    color: #666 !important;
    background: #f8f9fa !important;
    border-top: 1px solid #e9ecef !important;
}

.timestamp {
    font-size: 10px !important;
    color: #aaa !important;
    margin-top: 5px !important;
    text-align: right !important;
}

.typing-indicator {
    display: flex !important;
    padding: 12px 16px !important;
    background: white !important;
    border-radius: 18px !important;
    margin-bottom: 15px !important;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05) !important;
    border: 1px solid #e2e8f0 !important;
    width: fit-content !important;
    align-items: center !important;
}

.typing-indicator span {
    height: 8px !important;
    width: 8px !important;
    float: left !important;
    margin: 0 1px !important;
    background-color: #9E9EA1 !important;
    display: block !important;
    border-radius: 50% !important;
    opacity: 0.4 !important;
}

.typing-indicator span:nth-of-type(1) {
    animation: typing 1s infinite 0s !important;
}

.typing-indicator span:nth-of-type(2) {
    animation: typing 1s infinite 0.2s !important;
}

.typing-indicator span:nth-of-type(3) {
    animation: typing 1s infinite 0.4s !important;
}

@keyframes typing {
    0% { transform: translateY(0px); }
    50% { transform: translateY(-5px); }
    100% { transform: translateY(0px); }
}

/* Responsive */
@media (max-width: 460px) {
    #chatWindow {
        width: calc(100vw - 40px) !important;
        right: 20px !important;
        left: 20px !important;
        bottom: 150px !important; /* Modifié: ajusté pour les mobiles */
        height: 70vh !important;
    }
    
    #chatBot {
        bottom: 100px !important; /* Modifié: ajusté pour les mobiles */
        right: 20px !important;
        width: 50px !important;
        height: 50px !important;
        font-size: 20px !important;
    }
    
    .message-content {
        max-width: 200px !important;
        font-size: 13px !important;
    }
    
    .quick-btns {
        flex-wrap: wrap !important;
    }
    
    .quick-btn {
        width: calc(50% - 4px) !important;
        text-align: center !important;
        padding: 8px 10px !important;
    }
}
</style>

<!-- BOUTON CHATBOT -->
<button id="chatBot" onclick="toggleChat()">
    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <path d="M14 9a2 2 0 0 1-2 2H6l-4 4V4c0-1.1.9-2 2-2h8a2 2 0 0 1 2 2v5Z"/>
        <path d="M18 9h2a2 2 0 0 1 2 2v11l-4-4h-6a2 2 0 0 1-2-2v-1"/>
        <circle cx="12" cy="8" r="1"/>
        <circle cx="8" cy="8" r="1"/>
    </svg>
</button>

<!-- FENÊTRE CHATBOT -->
<div id="chatWindow">
    <div class="chat-header">
        <div class="chat-title">
            🤖 Assistant AMDD
        </div>
        <button class="chat-close" onclick="closeChat()">
            ✕
        </button>
    </div>
    
    <div class="chat-messages" id="chatMessages">
        <div class="welcome-msg">
            <h3>👋 Bonjour !</h3>
            <p>Je suis l'assistant virtuel de l'AMDD. Comment puis-je vous aider ?</p>
            <div class="quick-btns">
                <button class="quick-btn" onclick="sendQuickMessage('Bonjour')">👋 Saluer</button>
                <button class="quick-btn" onclick="sendQuickMessage('Nos services')">❓ Services</button>
                <button class="quick-btn" onclick="sendQuickMessage('Adhésion')">📝 Adhésion</button>
                <button class="quick-btn" onclick="sendQuickMessage('Contact')">📞 Contact</button>
            </div>
        </div>
    </div>
    
    <div class="chat-input">
        <div class="input-group">
            <textarea id="messageInput" placeholder="Tapez votre message..." rows="1"></textarea>
            <button id="sendBtn" onclick="sendMessage()">
                ➤
            </button>
        </div>
        <div class="footer-text">
            Assistant virtuel AMDD - Développement durable au Maroc
        </div>
    </div>
</div>

<script>
function toggleChat() {
    const chatWindow = document.getElementById('chatWindow');
    chatWindow.classList.toggle('show');
    
    if (chatWindow.classList.contains('show')) {
        document.getElementById('messageInput').focus();
    }
}

function closeChat() {
    document.getElementById('chatWindow').classList.remove('show');
}

function sendQuickMessage(message) {
    document.getElementById('messageInput').value = message;
    sendMessage();
}


function sendMessage() {
    const input = document.getElementById('messageInput');
    const message = input.value.trim();

    if (!message) return;

    // Afficher le message utilisateur
    addMessage(message, 'user');
    input.value = '';

    // Afficher un indicateur de chargement
    const chatMessages = document.getElementById('chatMessages');
    const loadingDiv = document.createElement('div');
    loadingDiv.className = 'message bot-message';
    loadingDiv.innerHTML = `<div class="bot-avatar">🤖</div><div class="message-content">En cours...</div>`;
    chatMessages.appendChild(loadingDiv);
    chatMessages.scrollTop = chatMessages.scrollHeight;

    // Appel à l'API Laravel
    fetch('/api/chatbot/send', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ message: message })
    })
    .then(response => response.json())
    .then(data => {
        loadingDiv.remove();
        if (data.success) {
            addMessage(data.response, 'bot');
        } else {
            addMessage('Erreur: ' + (data.error || 'Réponse invalide'), 'bot');
        }
    })
    .catch((error) => {
        console.error('Erreur API:', error);
        loadingDiv.remove();
        addMessage('Erreur de connexion au serveur. Vérifiez que le serveur Laravel fonctionne.', 'bot');
    });
}

function addMessage(message, type) {
    const chatMessages = document.getElementById('chatMessages');
    const messageDiv = document.createElement('div');
    messageDiv.className = `message ${type}-message`;
    
    if (type === 'bot') {
        messageDiv.innerHTML = `
            <div class="bot-avatar">🤖</div>
            <div class="message-content">${message}</div>
        `;
    } else {
        messageDiv.innerHTML = `
            <div class="message-content">${message}</div>
        `;
    }
    
    chatMessages.appendChild(messageDiv);
    chatMessages.scrollTop = chatMessages.scrollHeight;
}

function generateResponse(message) {
    const msg = message.toLowerCase();
    
    // Réponses spécifiques à l'AMDD
    if (msg.includes('bonjour') || msg.includes('salut')) {
        return 'Bonjour ! Je suis ravi de vous aider. Que souhaitez-vous savoir sur l\'AMDD ?';
    }
    
    if (msg.includes('service') || msg.includes('faites-vous')) {
        return 'L\'AMDD (Association Marocaine pour le Développement Durable) œuvre pour le développement durable au Maroc. Nous proposons des formations, des projets environnementaux et des initiatives communautaires.';
    }
    
    if (msg.includes('adhésion') || msg.includes('adhérer')) {
        return 'Pour adhérer à l\'AMDD, cliquez sur le bouton "Adhésion" en haut de la page. Vous pouvez également nous contacter directement pour plus d\'informations sur le processus d\'adhésion.';
    }
    
    if (msg.includes('contact')) {
        return 'Vous pouvez nous contacter de plusieurs façons :<br>📧 Email : direction.amdd@gmail.com<br>📞 Téléphone : +212 760-122146<br>📍 Adresse : Quartier Sbata, Casablanca, Maroc<br>Ou via notre page Contact du site.';
    }
    
    if (msg.includes('formation') || msg.includes('cours')) {
        return 'Nous proposons diverses formations en développement durable, gestion environnementale et entrepreneuriat social. Consultez notre section Activités pour voir nos prochaines formations.';
    }
    
    if (msg.includes('événement') || msg.includes('activité')) {
        return 'Nous organisons régulièrement des événements et activités. Consultez notre page Événements pour découvrir nos prochaines activités et vous inscrire.';
    }
    
    if (msg.includes('projet') || msg.includes('initiative')) {
        return 'L\'AMDD mène plusieurs projets : reforestation, sensibilisation environnementale, économie circulaire et énergies renouvelables. Souhaitez-vous participer à nos projets ?';
    }
    
    if (msg.includes('casablanca') || msg.includes('maroc')) {
        return 'Nous sommes basés à Casablanca, dans le quartier Sbata. Nous intervenons dans tout le Maroc pour nos projets de développement durable.';
    }
    
    if (msg.includes('merci')) {
        return 'Je vous en prie ! N\'hésitez pas si vous avez d\'autres questions. L\'équipe de l\'AMDD est là pour vous aider.';
    }
    
    if (msg.includes('aide') || msg.includes('help')) {
        return 'Je peux vous aider avec :<br>• Informations sur l\'AMDD<br>• Procédure d\'adhésion<br>• Nos formations et projets<br>• Événements à venir<br>• Contact et localisation<br><br>Que souhaitez-vous savoir ?';
    }
    
    // Réponse par défaut
    return 'Je ne suis pas sûr de comprendre votre question. Pouvez-vous la reformuler ? Je peux vous aider avec des informations sur l\'AMDD, nos services, l\'adhésion, nos événements ou nos contacts.';
}

// Permettre l'envoi avec Enter
document.addEventListener('DOMContentLoaded', function() {
    const messageInput = document.getElementById('messageInput');
    if (messageInput) {
        messageInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter' && !e.shiftKey) {
                e.preventDefault();
                sendMessage();
            }
        });
    }
});
</script>
</footer>



<style>
    ul {
        margin: 0px;
        padding: 0px;
    }

    .footer-section {
        background: #F8F8FF;
        position: relative;
    }

    .containerIcon {
        width: 50px;
    }

    .footer-cta {
        border-bottom: 1px solid #373636;
    }

    .single-cta {
        display: flex;
        /* Corrected quotation marks */
        flex-direction: row;
        /* Corrected quotation marks */
        justify-content: center;
        align-items: center;
        /* Added for better vertical alignment */
    }

    .single-cta i {
        color: #005daa;
        font-size: 30px;
        margin-right: 15px;
        /* Adjusted spacing between icon and text */
    }

    .cta-text {
        padding-left: 0;
        /* Adjusted padding for better alignment */
        display: inline-block;
    }

    .cta-text h4 {
        color: black;
        font-size: 20px;
        font-weight: 600;
        margin-bottom: 2px;
    }

    .cta-text span {
        color: #757575;
        font-size: 15px;
    }

    .footer-content {
        position: relative;
        z-index: 2;
    }

    .footer-pattern img {
        position: absolute;
        top: 0;
        left: 0;
        height: 330px;
        background-size: cover;
        background-position: 100% 100%;
    }

    .footer-logo {
        margin-bottom: 30px;
    }

    .footer-logo img {
        max-width: 200px;
    }

    .footer-text p {
        margin-bottom: 14px;
        font-size: 14px;
        color: #7e7e7e;
        line-height: 28px;
    }

    .footer-social-icon {
        display: flex;
        justify-content: center;
        /* Center the icons */
        gap: 10px;
        /* Add spacing between icons */
    }

    .footer-social-icon a {
        display: inline-block;
        width: 40px;
        height: 40px;
        text-align: center;
        line-height: 40px;
        border: 2px solid #878787;
        /* Add a border around the icons */
        border-radius: 4px;
        /* Make the border corners slightly rounded */
        font-size: 20px;
        color: #878787;
        transition: all 0.3s ease;
    }

    .footer-social-icon a:hover {
        border-color: #005daa;
        /* Change border color on hover */
        color: #005daa;
        /* Change icon color on hover */
    }

    .footer-social-icon i {
        vertical-align: middle;
    }

    .facebook-bg {
        background: #3B5998;
        width: 50px;
        height: 50px;
        border-radius: 50%;
    }

    .twitter-bg {
        background: #55ACEE;
        width: 50px;
        height: 50px;
        border-radius: 50%;
    }

    .google-bg {
        background: #DD4B39;
        width: 50px;
        height: 50px;
        border-radius: 50%;
    }

    .footer-widget-heading h3 {
        color: black;
        font-size: 20px;
        font-weight: 600;
        margin-bottom: 40px;
        position: relative;
    }

    .footer-widget-heading h3::before {
        content: "";
        position: absolute;
        left: 0;
        bottom: -15px;
        height: 2px;
        width: 50px;
        background: #005daa;
    }

    .footer-widget ul li {
        display: inline-block;
        float: left;
        width: 50%;
        margin-bottom: 12px;
    }

    .footer-widget ul li a:hover {
        color: #005daa;
    }

    .footer-widget ul li a {
        color: #878787;
        text-transform: capitalize;
    }

    .subscribe-form {
        position: relative;
    }

    .subscribe-form input {
        width: 100%;
        padding: 14px 28px;
        background: #FFFAFA;
        border: 1px solid #005daa;
        color: black;
    }

    .subscribe-form button {
        position: absolute;
        right: 0;
        background: #005daa;
        padding: 10px 15px;
        border: 1px solid #005daa;
        top: 0;
    }

    .subscribe-form button i {
        color: black;
        font-size: 22px;
        transform: rotate(-6deg);
    }

    .copyright-area {
        background: #202020;
        padding: 25px 0;
    }

    .copyright-text p {
        margin: 0;
        font-size: 14px;
        color: #878787;
    }

    .copyright-text p a {
        color: #005daa;
    }

    .footer-menu li {
        display: inline-block;
        margin-left: 20px;
    }

    .footer-menu li:hover a {
        color: #005daa;
    }

    .footer-menu li a {
        font-size: 14px;
        color: #878787;
    }
</style>
