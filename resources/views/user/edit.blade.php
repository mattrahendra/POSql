@extends('user.layouts.admin')

@section('title', 'Edit Profil')
@section('content-header', 'Edit Profil')

@section('content')

    <div class="card">
        <div class="card-body">

            <form action="{{route('user.simpan')}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                id="name" value="{{ auth()->user()->getFullname() }}">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                id="email" value="{{ auth()->user()->getEmail() }}">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror"
                                id="alamat" placeholder="alamat" value="{{ auth()->user()->getAlamat()}}">
                            @error('alamat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

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
                                @php
                                    // Retrieve user avatar
                                    $avatar = auth()
                                        ->user()
                                        ->getAvatar();
                                    $avatarPath = Storage::url("$avatar");
                                @endphp
                                <!-- Display user avatar with default if not available -->
                                <img src="{{ $avatar == null ? asset('images/img/default.png') : $avatarPath }}"
                                    class="img-circle align-content-center" alt="User Image" id="avatarImage" style="max-width: 50%">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
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
