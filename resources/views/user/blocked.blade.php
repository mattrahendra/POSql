@extends('user.layouts.admin')

@section('title', 'Blocked')

@section('content')

    <div class="container">
        <h1>Maaf, Akun Anda Telah Diblokir</h1>
        <p>
            Mohon maaf, akun Anda telah diblokir. Jika Anda memiliki pertanyaan lebih lanjut, silakan hubungi
            <a href="mailto:dev@posql.my.id">dukungan pelanggan</a>.
        </p>

        <form action="{{ route('logout') }}" method="post">
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>
    </div>

    <!-- Bootstrap JS (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection
