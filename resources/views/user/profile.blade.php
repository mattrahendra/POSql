@extends('user.layouts.admin')

@section('content')

    <head>
        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            body {
                background: #fff;
                font: 14px/1.4 -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
                color: rgba(0, 0, 0, 0.6);
            }

            .profile-page {
                display: flex;
                min-height: 50vh;
                padding-top: 5rem;
            }

            @media (max-width: 990px) {
                .profile-page {
                    padding-top: 0;
                }
            }

            .profile-page .content {
                display: flex;
                flex-direction: column;
                max-width: 800px;
                width: 100%;
                position: relative;
                z-index: 2;
                margin: auto;
                padding: 2rem;
                background: #fff;
                border-radius: 2rem;
                box-shadow: 0 15px 35px rgba(50, 50, 93, 0.1), 0 5px 15px rgba(0, 0, 0, 0.07);
            }

            @media (max-width: 990px) {
                .profile-page .content {
                    max-width: 420px;
                    padding: 0;
                    border-radius: 0;
                }
            }

            .profile-page .content__cover {
                position: relative;
                background: linear-gradient(150deg, #1d8cf8 20%, #3358f4 100%);
            }

            .theme-orange .profile-page .content__cover {
                background: linear-gradient(150deg, #ff4086 20%, #fd8d76 100%);
            }

            .theme-purple .profile-page .content__cover {
                background: linear-gradient(150deg, #8700ff 20%, #f000ff 100%);
            }

            .theme-green .profile-page .content__cover {
                background: linear-gradient(150deg, #1dcc45 20%, #42b883 100%);
            }

            .theme-blue .profile-page .content__cover {
                background: linear-gradient(150deg, #0098f0 20%, #00f2c3 100%);
            }

            .profile-page .content__bull {
                display: none;
                height: 12rem;
                position: relative;
                overflow: hidden;
            }

            @media (max-width: 990px) {
                .profile-page .content__bull {
                    display: block;
                }
            }

            .profile-page .content__bull span:nth-child(1) {
                display: block;
                position: absolute;
                z-index: 1;
                border-radius: 50%;
            }

            .profile-page .content__bull span:nth-child(2) {
                display: block;
                position: absolute;
                z-index: 1;
                border-radius: 50%;
            }

            .profile-page .content__bull span:nth-child(3) {
                display: block;
                position: absolute;
                z-index: 1;
                border-radius: 50%;
            }

            .profile-page .content__bull span:nth-child(4) {
                display: block;
                position: absolute;
                z-index: 1;
                border-radius: 50%;
            }

            .profile-page .content__bull span:nth-child(5) {
                display: block;
                position: absolute;
                z-index: 1;
                border-radius: 50%;
            }

            .profile-page .content__bull span:nth-child(1) {
                width: 5rem;
                height: 5rem;
                top: -6%;
                left: -3%;
                background: rgba(255, 255, 255, 0.12);
            }

            .profile-page .content__bull span:nth-child(2) {
                width: 8rem;
                height: 8rem;
                top: 18%;
                left: 18%;
                background: rgba(255, 255, 255, 0.05);
            }

            .profile-page .content__bull span:nth-child(3) {
                width: 3rem;
                height: 3rem;
                top: 8%;
                right: 2%;
                background: rgba(255, 255, 255, 0.05);
            }

            .profile-page .content__bull span:nth-child(4) {
                width: 6rem;
                height: 6rem;
                top: 28%;
                right: 12%;
                background: rgba(255, 255, 255, 0.1);
            }

            .profile-page .content__bull span:nth-child(5) {
                width: 4rem;
                height: 4rem;
                top: 70%;
                left: -6%;
                background: rgba(255, 255, 255, 0.04);
            }

            .profile-page .content__avatar {
                width: 12rem;
                height: 12rem;
                position: absolute;
                bottom: 0;
                left: 50%;
                z-index: 2;
                transform: translate(-50%, 50%);
                background: #ffffff url("") center center no-repeat;
                background-size: cover;
                border-radius: 50%;
                box-shadow: 0 15px 35px rgba(50, 50, 93, 0.1), 0 5px 15px rgba(0, 0, 0, 0.07);
            }

            .profile-page .content__avatar::before {
                content: "";
                position: absolute;
                top: 0;
                bottom: 0;
                left: 0;
                right: 0;
                border-radius: 50%;
            }

            @media (max-width: 990px) {
                .profile-page .content__avatar {
                    width: 11rem;
                    height: 11rem;
                    border: 0.3rem solid #fff;
                    box-shadow: none;
                }
            }

            .profile-page .content__actions {
                display: flex;
                justify-content: space-between;
                padding: 0.2rem;
            }

            @media (max-width: 990px) {
                .profile-page .content__actions {
                    padding: 0.8rem 2rem;
                }
            }

            .profile-page .content__actions a {
                display: flex;
                flex-flow: row nowrap;
                align-items: center;
                justify-content: center;
                height: 3rem;
                padding: 0.2rem 1rem;
                border-radius: 2rem;
                text-decoration: none;
                font-size: 0.9rem;
            }

            @media (max-width: 990px) {
                .profile-page .content__actions a {
                    padding: 0.5rem;
                }
            }

            @media (max-width: 990px) {
                .profile-page .content__actions a span {
                    display: none;
                }
            }

            .profile-page .content__actions a svg {
                width: 2rem;
                margin-right: 0.4rem;
            }

            @media (max-width: 990px) {
                .profile-page .content__actions a svg {
                    margin: 0;
                }
            }

            .profile-page .content__actions a svg path:last-child {
                opacity: 0.5;
            }

            .profile-page .content__actions a:first-child {
                color: #ff4086;
            }

            .theme-orange .profile-page .content__actions a:first-child {
                color: #ff4086;
            }

            .theme-purple .profile-page .content__actions a:first-child {
                color: #8700ff;
            }

            .theme-green .profile-page .content__actions a:first-child {
                color: #1dcc45;
            }

            .theme-blue .profile-page .content__actions a:first-child {
                color: #0098f0;
            }

            .profile-page .content__actions a:last-child {
                color: #d782d9;
            }

            .theme-orange .profile-page .content__actions a:last-child {
                color: #fd8d76;
            }

            .theme-purple .profile-page .content__actions a:last-child {
                color: #f000ff;
            }

            .theme-green .profile-page .content__actions a:last-child {
                color: #42b883;
            }

            .theme-blue .profile-page .content__actions a:last-child {
                color: #00f2c3;
            }

            .profile-page .content__actions a:hover:first-child {
                background: #1d8cf8;
                color: #fff;
            }

            .theme-orange .profile-page .content__actions a:hover:first-child {
                background: #ff4086;
            }

            .theme-purple .profile-page .content__actions a:hover:first-child {
                background: #8700ff;
            }

            .theme-green .profile-page .content__actions a:hover:first-child {
                background: #1dcc45;
            }

            .theme-blue .profile-page .content__actions a:hover:first-child {
                background: #0098f0;
            }

            .profile-page .content__actions a:hover:last-child {
                background: #1d8cf8;
                color: #fff;
            }

            .theme-orange .profile-page .content__actions a:hover:last-child {
                background: #fd8d76;
            }

            .theme-purple .profile-page .content__actions a:hover:last-child {
                background: #f000ff;
            }

            .theme-green .profile-page .content__actions a:hover:last-child {
                background: #42b883;
            }

            .theme-blue .profile-page .content__actions a:hover:last-child {
                background: #00f2c3;
            }

            .profile-page .content__title {
                margin-top: 4.5rem;
                text-align: center;
                order: 1;
            }

            @media (max-width: 990px) {
                .profile-page .content__title {
                    margin-top: 1.5rem;
                }
            }

            .profile-page .content__title h1 {
                margin-bottom: 0.1rem;
                font-size: 2.4rem;
            }

            @media (max-width: 990px) {
                .profile-page .content__title h1 {
                    font-size: 1.8rem;
                }
            }

            .profile-page .content__title span {
                font-size: 1rem;
            }

            @media (max-width: 990px) {
                .profile-page .content__title span {
                    font-size: 0.9rem;
                }
            }

            .profile-page .content__description {
                margin-top: 2.5rem;
                text-align: center;
                order: 2;
            }

            @media (max-width: 990px) {
                .profile-page .content__description {
                    margin-top: 1.5rem;
                    order: 3;
                }
            }

            .profile-page .content__description p {
                margin-bottom: 0.2rem;
                font-size: 1.2rem;
            }

            @media (max-width: 990px) {
                .profile-page .content__description p {
                    font-size: 1rem;
                }
            }

            .profile-page .content__list {
                display: flex;
                justify-content: center;
                margin-top: 2rem;
                list-style-type: none;
                order: 3;
            }

            @media (max-width: 990px) {
                .profile-page .content__list {
                    margin-top: 1.5rem;
                    order: 2;
                }
            }

            .profile-page .content__list li {
                padding: 0 1.5rem;
                text-align: center;
                font-size: 1rem;
            }

            @media (max-width: 990px) {
                .profile-page .content__list li {
                    font-size: 0.8rem;
                }
            }

            .profile-page .content__list li span {
                display: block;
                margin-bottom: 0.1rem;
                font-weight: bold;
                font-size: 1.6rem;
            }

            @media (max-width: 990px) {
                .profile-page .content__list li span {
                    font-size: 1.2rem;
                }
            }

            .profile-page .content__button {
                margin: 3rem 0 2rem;
                text-align: center;
                order: 4;
            }

            @media (max-width: 990px) {
                .profile-page .content__button {
                    margin: 1.5rem 0 2.2rem;
                }
            }

            .profile-page .content__button .button {
                display: inline-block;
                padding: 1.2rem 1.8rem;
                text-align: center;
                text-decoration: none;
                background: linear-gradient(100deg, #1d8cf8 30%, #3358f4 100%);
                border-radius: 2rem;
                box-shadow: 0 4px 6px rgba(50, 50, 93, 0.11), 0 1px 3px rgba(0, 0, 0, 0.08);
                font-size: 1rem;
                color: #fff;
                cursor: pointer;
            }

            .theme-orange .profile-page .content__button .button {
                background: linear-gradient(100deg, #ff4086 10%, #fd8d76 100%);
            }

            .theme-purple .profile-page .content__button .button {
                background: linear-gradient(100deg, #8700ff 10%, #f000ff 100%);
            }

            .theme-green .profile-page .content__button .button {
                background: linear-gradient(100deg, #1dcc45 10%, #42b883 100%);
            }

            .theme-blue .profile-page .content__button .button {
                background: linear-gradient(100deg, #0098f0 10%, #00f2c3 100%);
            }

            .profile-page .content__button .button:hover {
                color: #fff;
            }

            @media (max-width: 990px) {
                .profile-page .content__button .button {
                    padding: 1rem 1.4rem;
                    font-size: 0.9rem;
                }
            }

            .profile-page .bg {
                width: 100%;
                height: 50%;
                position: absolute;
                top: 0;
                left: 0;
                z-index: 1;
            }

            .profile-page .bg div {
                content: "";
                width: 100%;
                height: 100%;
                position: absolute;
                top: 0;
                left: 0;
                z-index: 1;
                overflow: hidden;
                background: linear-gradient(150deg, #1d8cf8 20%, #3358f4 100%);
            }

            .theme-orange .profile-page .bg div {
                background: linear-gradient(150deg, #ff4086 20%, #fd8d76 100%);
            }

            .theme-purple .profile-page .bg div {
                background: linear-gradient(150deg, #8700ff 20%, #f000ff 100%);
            }

            .theme-green .profile-page .bg div {
                background: linear-gradient(150deg, #1dcc45 20%, #42b883 100%);
            }

            .theme-blue .profile-page .bg div {
                background: linear-gradient(150deg, #0098f0 20%, #00f2c3 100%);
            }

            .profile-page .bg span:nth-child(1) {
                display: block;
                position: absolute;
                z-index: 2;
                border-radius: 50%;
                animation: floating 34s infinite;
            }

            .profile-page .bg span:nth-child(2) {
                display: block;
                position: absolute;
                z-index: 2;
                border-radius: 50%;
                animation: floating 34s infinite;
            }

            .profile-page .bg span:nth-child(3) {
                display: block;
                position: absolute;
                z-index: 2;
                border-radius: 50%;
                animation: floating 34s infinite;
            }

            .profile-page .bg span:nth-child(4) {
                display: block;
                position: absolute;
                z-index: 2;
                border-radius: 50%;
                animation: floating 34s infinite;
            }

            .profile-page .bg span:nth-child(5) {
                display: block;
                position: absolute;
                z-index: 2;
                border-radius: 50%;
                animation: floating 34s infinite;
            }

            .profile-page .bg span:nth-child(6) {
                display: block;
                position: absolute;
                z-index: 2;
                border-radius: 50%;
                animation: floating 34s infinite;
            }

            .profile-page .bg span:nth-child(7) {
                display: block;
                position: absolute;
                z-index: 2;
                border-radius: 50%;
                animation: floating 34s infinite;
            }

            .profile-page .bg span:nth-child(1) {
                width: 11rem;
                height: 11rem;
                top: 30%;
                left: 16%;
                background: rgba(255, 255, 255, 0.05);
                animation-duration: 34s;
            }

            .profile-page .bg span:nth-child(2) {
                width: 8rem;
                height: 8rem;
                top: 18%;
                left: 1%;
                background: rgba(255, 255, 255, 0.12);
                animation-duration: 40s;
            }

            .profile-page .bg span:nth-child(3) {
                width: 8rem;
                height: 8rem;
                top: 34%;
                right: 10%;
                background: rgba(255, 255, 255, 0.1);
                animation-duration: 38s;
            }

            .profile-page .bg span:nth-child(4) {
                width: 4rem;
                height: 4rem;
                top: 34%;
                right: 3%;
                background: rgba(255, 255, 255, 0.2);
                animation-duration: 34s;
            }

            .profile-page .bg span:nth-child(5) {
                width: 12rem;
                height: 12rem;
                top: 42%;
                right: 28%;
                background: rgba(255, 255, 255, 0.1);
                animation-duration: 40s;
            }

            .profile-page .bg span:nth-child(6) {
                width: 8rem;
                height: 8rem;
                top: 72%;
                left: 6%;
                background: rgba(255, 255, 255, 0.05);
                animation-duration: 38s;
            }

            .profile-page .bg span:nth-child(7) {
                width: 4rem;
                height: 4rem;
                top: 82%;
                right: 8%;
                background: rgba(255, 255, 255, 0.05);
                animation-duration: 34s;
            }

        </style>
    </head>

    <div class="profile-page">
        <!-- Profile Content -->
        <div class="content">
            <!-- Cover Section -->
            <div class="content__cover">
                <!-- Avatar -->
                <div class="content__avatar">
                    @php
                        $avatar = auth()
                            ->user()
                            ->getAvatar();
                        $avatarPath = Storage::url("$avatar");
                    @endphp
                    <!-- Display user avatar with default if not available -->
                    <img src="{{ $avatar == null ? asset('images/img/default.png') : $avatarPath }}"
                        class="img-circle elevation-2" alt="User Image">
                </div>
            </div>

            <!-- Profile Title and Location -->
            <div class="content__title">
                <h1 class="mb-0">{{ auth()->user()->getFullname() }}</h1>
                <span class="mt-0">{{ auth()->user()->getEmail() }}</span>
            </div>

            <!-- Profile Description -->
            <div class="content__description">
                <p class="text-bold">alamat</p>
                <p>{{ auth()->user()->getAlamat() }}</p>
            </div>



            <!-- Logout Form -->

            <div class="row">
                <a href="{{ route('user.edit') }}" class="btn-sm btn-primary mr-2" style="padding-left: 2.2%; padding-right:2.2%">Edit</a>
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit" class="btn-sm btn-danger">Logout</button>
                </form>
            </div>

        </div>

    </div>
@endsection
