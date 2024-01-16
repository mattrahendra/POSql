{{-- <!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link">
        <img src="{{ asset('images/logo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                @php
                    $avatar = auth()
                        ->user()
                        ->getAvatar();
                    $avatarPath = asset('images/img/') . '/' . $avatar;
                @endphp

                <img src="{{ $avatar == null ? asset('images/img/default.png') : $avatarPath }}"
                    class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ auth()->user()->getFullname() }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item has-treeview">
                    <a href="{{ route('user.home') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{ route('products.index') }}" class="nav-link {{ activeSegment('products') }}">
                        <i class="nav-icon fas fa-th-large"></i>
                        <p>Tambah Produk</p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{ route('user.cart.index') }}" class="nav-link {{ activeSegment('cart') }}">
                        <i class="nav-icon fas fa-cart-plus"></i>
                        <p>Transaksi</p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{ route('orders.index') }}" class="nav-link {{ activeSegment('orders') }}">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>Laporan</p>
                    </a>
                </li>
                {{-- <li class="nav-item has-treeview">
                    <a href="{{ route('customers.index') }}" class="nav-link {{ activeSegment('customers') }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Data Pengguna</p>
                    </a>
                </li> --}}
{{-- <li class="nav-item has-treeview">
                    <a href="{{ route('settings.index') }}" class="nav-link {{ activeSegment('settings') }}">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>Settings</p>
                    </a>
                </li> --}}
{{-- <li class="nav-item">
                    <a href="#" class="nav-link" onclick="document.getElementById('logout-form').submit()">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                        <form action="{{ route('logout') }}" method="POST" id="logout-form">
                            @csrf
                        </form>
                    </a>
                </li> --}}
{{-- <li class="nav-item">
                    <a href="{{route('logout')}}" class="nav-link" >
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>
                </li> --}}
{{-- </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside> --}}

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('images/logo.svg') }}" rel='icon'>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&family=Work+Sans:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css">
    <link rel="stylesheet" href="{{ asset('assets/css/libraries.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
</head>

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
                    <a class="nav__item-link" href="{{ route('user.home') }}">Home</a>
                </li>
                <li class="nav__item">
                    <a class="nav__item-link {{ activeSegment('products') }}"
                        href="{{ route('products.index') }}">Produk</a>
                </li>
                <li class="nav__item">
                    <a class="nav__item-link {{ activeSegment('cart') }}"
                        href="{{ route('user.cart.index') }}">Transaksi</a>
                </li>
                <li class="nav__item">
                    <a class="nav__item-link {{ activeSegment('orders') }}"
                        href="{{ route('orders.index') }}">Laporan</a>
                </li>
                <li class="nav__item" style="margin-right:0%">
                    @php
                        $avatar = auth()
                            ->user()
                            ->getAvatar();
                        $avatarPath = Storage::url("$avatar");
                    @endphp
                    <div style="display: flex; align-items: center;">
                        <img src="{{ $avatar == null ? asset('images/img/default.png') : $avatarPath }}"
                            class="img-circle img-fluid mr-1" alt="User Image"
                            style="object-fit: cover; max-width: 35px; max-height: 35px;">
                        <a href="{{ route('user.profile') }}"
                            class="nav__item-link {{ activeSegment('profile') }}">{{ auth()->user()->getFullname() }}</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
