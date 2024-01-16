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

            <section class="fancybox-layout2 pb-70">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-11 mb-40">
                            <h2 class="heading-subtitle">Aplikasi Mesin Kasir</h2>
                            <h3 class="heading-title">POSql</h3>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-sm-12 col-md-12 col-lg-4">
                            <div class="fancybox-item d-flex">
                                <div class="fancybox-item__heading">
                                    <h4 class="fancybox-item__title">POSql?</h4>
                                </div>
                                <div class="fancybox-item__content">
                                    <p class="fancybox-item__desc">POSql adlah aplikasi yang dibuat untuk memenuhi
                                        kebutuhan kepada para pebisnis yang ingin mencatat pemasukan barang melalui
                                        aplikasi</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-12 col-lg-4">
                            <div class="fancybox-item d-flex">
                                <div class="fancybox-item__heading">
                                    <h4 class="fancybox-item__title">Tujuan</h4>
                                </div>
                                <div class="fancybox-item__content">
                                    <p class="fancybox-item__desc">Tujuan Produk ini adalah untuk mempermudah
                                        proses
                                        dalam melakukan transaksi, maupun penambahan produk baru</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-12 col-lg-4">
                            <div class="fancybox-item d-flex">
                                <div class="fancybox-item__heading">
                                    <h4 class="fancybox-item__title">Manfaat</h4>
                                </div>
                                <div class="fancybox-item__content">
                                    <p class="fancybox-item__desc">Lebih mudah dan efisien dibandingkan dengan
                                        mencatat
                                        secara manual</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </header>
    </div>

    <script src="{{ asset('assets/js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtFZ5a5XhQUTUJ5jDlr" crossorigin="anonymous">
    </script>
</body>
