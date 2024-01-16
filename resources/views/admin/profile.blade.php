@extends('admin.layouts.admin')

@section('content-header', 'My Profile')

@section('content')

    <div class="container-fluid">
        <div class="card">
            <div class="card-body">

                <div class="row">
                    <div class="col-1">
                        <div class="img">
                            @php
                                $avatar = auth()
                                    ->user()
                                    ->getAvatar();
                                $avatarPath = Storage::url("$avatar");
                            @endphp
                            <img class="img-circle border-3" style="max-width:100%"
                                src="{{ $avatar == null ? asset('images/img/default.png') : $avatarPath }}"
                                alt="Profile Photo">
                        </div>
                    </div>
                    <div class="col-2">
                        <h2 class="px-2">
                            {{ auth()->user()->getFullname() }}
                        </h2>
                        <p class="px-2" style="margin-top: 0%">
                            {{ auth()->user()->getEmail() }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <h4 class="ml-2">
        Edit profile
    </h4>

    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.simpan') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text" name="name"
                                    class="form-control @error('name') is-invalid @enderror" id="name"
                                    value="{{ auth()->user()->getFullname() }}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email"
                                    class="form-control @error('email') is-invalid @enderror" id="email"
                                    value="{{ auth()->user()->getEmail() }}">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">

                                <div class="form-group mt-3">
                                    <label for="password">Ubah Password</label>
                                    <input type="password" name="password"
                                        class="form-control @error('password') is-invalid @enderror" id="password"
                                        placeholder=" ">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <button class="btn btn-primary" type="submit">Simpan</button>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="image">Gambar</label>
                                <div hidden class="custom-file">
                                    <input type="file" class="custom-file-input" name="image" id="imageInput">
                                    <label class="custom-file-label" for="imageInput">Choose file</label>
                                </div>
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <div class="content__avatar mt-3" style="">
                                    <center>

                                        @php
                                            // Retrieve user avatar
                                            $avatar = auth()
                                                ->user()
                                                ->getAvatar();
                                            $avatarPath = Storage::url("$avatar");
                                        @endphp
                                        <!-- Display user avatar with default if not available -->
                                        <img src="{{ $avatar == null ? asset('images/img/default.png') : $avatarPath }}"
                                            class="img-circle align-content-center" alt="User Image" id="avatarImage"
                                            style="max-width: 40%">
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            bsCustomFileInput.init();
        });
    </script>
    <script>
        // Add a click event listener to the image
        document.getElementById('avatarImage').addEventListener('click', function() {
            // Trigger a click on the file input
            document.getElementById('imageInput').click();
        });
    </script>
@endsection
