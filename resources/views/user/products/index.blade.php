@extends('user.layouts.admin')

@section('title', 'List Produk')
@section('content-header', 'List Produk')
@section('content-actions')
<a href="{{route('products.create')}}" class="btn btn-primary">Tambah Produk</a>
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('plugins/sweetalert2/sweetalert2.min.css') }}">
@endsection
@section('content')
<div class="card product-list">
    <div class="card-body">
        <table class="table table-responsive-sm table-responsive-md">
            <thead>
                <tr>
                    {{-- <th>ID</th> --}}
                    <th>Nama</th>
                    <th>Gambar</th>
                    <th>Barcode</th>
                    <th>Harga</th>
                    {{-- <th>Stok</th> --}}
                    <th>Status</th>
                    <th>Ditambah pada</th>
                    <th>Di Update Pada</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                @if ($product->user_id == auth()->user()->getId())
                <tr>
                    {{-- <td>{{$product->id}}</td> --}}
                    <td>{{$product->name}}</td>
                    <td><img class="product-img" src="{{ Storage::url($product->image) }}" alt=""></td>
                    <td>{{$product->barcode}}</td>
                    <td>{{$product->price}}</td>
                    {{-- <td>{{$product->quantity}}</td> --}}
                    <td>
                        <span class="right badge badge-{{ $product->status ? 'success' : 'danger' }}">{{$product->status ? 'Terseda' : 'Tidak Tersedia'}}</span>
                    </td>
                    <td>{{$product->created_at}}</td>
                    <td>{{$product->updated_at}}</td>
                    <td>
                        <a href="{{ route('products.edit', $product) }}" class="btn-primary btn-sm py-2"><i class="fas fa-edit"></i></a>
                        <button class="btn-danger btn-delete btn-sm" data-url="{{route('products.destroy', $product)}}"><i class="fas fa-trash"></i></button>
                    </td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
        {{ $products->render() }}
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
                title: 'Yakin?',
                text: "Ingin Menghapus data ini?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Tidak',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    $.post($this.data('url'), {
                        _method: 'DELETE',
                        _token: '{{csrf_token()}}'
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
