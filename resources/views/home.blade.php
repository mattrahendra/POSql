<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('images/logo.svg') }}" rel='icon'>
    <title>Selamat Datang</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&family=Work+Sans:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css">
    <link rel="stylesheet" href="{{ asset('assets/css/libraries.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
</head>

<body>
    <div class="wrapper">
        <header class="header header-transparent">
            <nav class="navbar navbar-expand-lg border-bottom-0">
                <div class="container">
                    <a class="navbar-brand" href="/">
                        <img src="{{ asset('images/logo.svg') }}" class="logo-dark" alt="logo"
                            style="margin-left: 2.5%; margin-right:2.5%; max-width: 8%">
                    </a>
                    {{-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button> --}}
                    <button class="navbar-toggler" type="button">
                        <span class="menu-lines"><span></span></span>
                    </button>
                    <div class="collapse navbar-collapse" id="mainNavigation">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav__item with-dropdown">
                                <a class="nav__item-link" href="/">Home</a>
                            </li>
                            <li class="nav__item">
                                <a class="nav__item-link" href="{{ route('about') }}">About</a>
                            </li>
                            <li class="nav__item">
                                <a class="nav__item-link" href="{{ route('login') }}">Login</a>
                            </li>
                            <li class="nav__item">
                                <a class="nav__item-link" href="{{ route('register') }}">Register</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <section class="slider slider-layout1">
                <div class="slick-carousel carousel-arrows-light m-slides-0"
                    data-slick='{"slidesToShow": 1, "arrows": true, "dots": true, "speed": 700,"fade": true,"cssEase": "linear"}'>
                    <div class="slide-item align-v-h">
                        <div class="bg-img"><img src="assets/images/backgrounds/9.jpg" alt="slide img"></div>
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-7">
                                    <div class="slide-item__content">
                                        <h1 class="slide-item__subtitle">Optimalkan Bisnis anda</h1>
                                        <h2 class="slide-item__title">Dengan POSql!</h2>
                                        <a href="{{ route('login') }}" class="btn btn__primary">Mulai</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slide-item align-v-h">
                        <div class="bg-img"><img src="assets/images/backgrounds/3.jpg" alt="slide img"></div>
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-7">
                                    <div class="slide-item__content">
                                        <h1 class="slide-item__subtitle">Bersama POSql</h1>
                                        <h2 class="slide-item__title">Raih Sukses Digital!</h2>
                                        <a href="{{ route('login') }}" class="btn btn__primary">Mulai</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slide-item align-v-h">
                        <div class="bg-img"><img src="assets/images/backgrounds/4.jpg" alt="slide img"></div>
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-7">
                                    <div class="slide-item__content">
                                        <h1 class="slide-item__subtitle">Pantau Bisnis anda</h1>
                                        <h2 class="slide-item__title">Dengan Laporan yang Akurat!</h2>
                                        <a href="{{ route('login') }}" class="btn btn__primary">Mulai</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </header>
        <footer class="footer">
            <div class="container">
                <div class="row footer-newsletter">
                    <div class="col-sm-12 col-md-12 col-lg-7">
                        <h5 class="footer-newsletter__title">
                            <span>Ingin berkomunikasi dengan kami?</span>
                            <span>Email kami di : <a href="mailto:qna@posql.my.id">qna@posql.my.id</a></span>
                        </h5>
                    </div>
                    {{-- <div class="col-sm-12 col-md-12 col-lg-5">
                        <form class="footer-newsletter__form d-flex">
                            <input type="text" class="form-control" placeholder="Subscribe and stay tuned!">
                            <button type="submit" class="submit-btn"><i class="icon-arrow-right"></i></button>
                        </form>
                    </div> --}}
                </div>
                <div class="row">
                    <div class="col-sm-6 col-md-3 col-lg-3 footer-widget">
                        <h6 class="footer-widget__title">Contact</h6>
                        <div class="footer-widget__content">
                            <p class="mb-0">E: dev@posql.my.id</p>
                            <p class="mb-0">P: 628 2268438151</p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 col-lg-3 footer-widget">
                        <h6 class="footer-widget__title">Office</h6>
                        <div class="footer-widget__content">
                            <p class="mb-0">Meskom, Jalan Kampung Zapin, No 30</p>
                        </div>
                    </div>
                    {{-- <div class="col-sm-6 col-md-3 col-lg-3 footer-widget">
                        <h6 class="footer-widget__title">Amsterdam Office</h6>
                        <div class="footer-widget__content">
                            <p class="mb-0">Amsterdam, 23 AlBahr Street, AlGharbia, Egypt.</p>
                        </div>
                    </div> --}}
                    <div class="col-sm-6 col-md-3 col-lg-3 footer-widget">
                        <h6 class="footer-widget__title">Social</h6>
                        <div class="footer-widget__content">
                            <ul class="social-icons list-unstyled">
                                <li><a href="#" title="facebook"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="https://www.instagram.com/posql" title="instagram" target="_blank"><i
                                            class="fab fa-instagram"></i></a></li>
                                <li><a href="#" title="twitter"><i class="fab fa-twitter"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 text-center">
                        <div class="footer-copyright  mt-50">
                            <span class="mb-0">&copy; 2023 POSql. All Rights Reserved
                                <a href="https://www.instagram.com/posql" target="_blank">posql</a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        {{-- <button id="scrollTopBtn"><i class="fas fa-long-arrow-alt-up"></i></button>
        <div class="search-popup">
            <i class="search-popup__close">&times;</i>
            <form class="search-popup__form">
                <input type="text" class="search-popup__form__input" placeholder="Type Words Then Enter">
                <button class="search-popup__btn"><i class="icon-search"></i></button>
            </form>
        </div>
        <div class="hamburger-menu">
            <i class="hamburger-menu__close">&times;</i>
            <div class="hamburger-menu__content">
                <h3 class="hamburger-menu__title">Ready to start your next project?</h3>
                <a class="hamburger-menu__email mb-50" href="mailto:Lambanella@7oroof.com">Lambanella@7oroof.com</a>
                <ul class="instagram-images list-unstyled d-flex flex-wrap mb-60">
                    <li><img src="assets/images/instagram/1.jpg" alt="instagram"></li>
                    <li><img src="assets/images/instagram/2.jpg" alt="instagram"></li>
                    <li><img src="assets/images/instagram/3.jpg" alt="instagram"></li>
                    <li><img src="assets/images/instagram/4.jpg" alt="instagram"></li>
                    <li><img src="assets/images/instagram/5.jpg" alt="instagram"></li>
                    <li><img src="assets/images/instagram/6.jpg" alt="instagram"></li>
                </ul>
                <p class="color-white font-weight-bold">Follow Us</p>
                <ul class="social-icons list-unstyled mb-0">
                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                </ul>
            </div> 
        </div> --}}
    </div>
    <script src="{{ asset('assets/js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtFZ5a5XhQUTUJ5jDlr" crossorigin="anonymous">
    </script>
</body>

</html>
