@extends('admin.layouts.admin')

@section('title', 'List Pengguna')
@section('content-header', 'List Pengguna')
@section('content-actions')
    {{-- <a href="{{ route('customers.create') }}" class="btn btn-primary">Tambah Pengguna</a> --}}
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('plugins/sweetalert2/sweetalert2.min.css') }}">
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Foto</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Alamat</th>
                        <th>Status</th>
                        <th>Terdaftar Pada</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customers as $customer)
                        @if ($customer->level == 'user')
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    @php
                                        $avatar = $customer->getAvatar();
                                        $avatarPath = Storage::url("$avatar");
                                    @endphp
                                    <img class="img-circle " width="50"
                                        src="{{ $avatar == null ? asset('images/img/default.png') : $avatarPath }}"
                                        alt="">
                                </td>
                                <td>{{ $customer->username }}</td>
                                <td>{{ $customer->email }}</td>
                                <td>{{ $customer->alamat }}</td>
                                <td>{{ $customer->status }}</td>
                                <td>{{ $customer->created_at }}</td>
                                <td>
                                    <a href="{{ route('customers.edit', $customer) }}" class="btn btn-primary"><i
                                            class="fas fa-edit"></i></a>
                                    {{-- <button class="btn btn-danger btn-delete" data-url="{{route('customers.destroy', $customer)}}"><i class="fas fa-trash"></i></button> --}}
                                </td>
                                <td>
                                    <form action="{{ route('block', $customer) }}" method="post">
                                        @csrf
                                        <button class="btn btn-danger"><i class="fas fa-lock"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
            {{ $customers->render() }}
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <script type="module">
        $(document).ready(function() {
            $(document).on('click', '.btn-delete', function() {
                var $this = $(this);
                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: 'btn btn-success',
                        cancelButton: 'btn btn-danger'
                    },
                    buttonsStyling: false
                })

                swalWithBootstrapButtons.fire({
                    title: 'Anda Yakin?',
                    text: "Apakah ingin menghapus data ini?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, Hapus!',
                    cancelButtonText: 'Tidak',
                    reverseButtons: true
                }).then((result) => {
                    if (result.value) {
                        $.post($this.data('url'), {
                            _method: 'DELETE',
                            _token: '{{ csrf_token() }}'
                        }, function(res) {
                            $this.closest('tr').fadeOut(500, function() {
                                $(this).remove();
                            })
                        })
                    }
                })
            })
        })
    </script>
@endsection
