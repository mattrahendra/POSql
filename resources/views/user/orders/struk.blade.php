<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk Pembelian</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <img src="{{ public_path('images/LOGOP.png') }}" alt="Logo Toko" class="img-fluid mx-4"
                    style="max-width:25%;">
                <p class="text-lg font-weight-bold" style="font-size: 30px; margin-bottom: 0;">Struk Pembelian</p>
                <p style="font-size: 12px; margin-top: 0;">{{ auth()->user()->getAlamat() }}</p>
            </div>
        </div>
        <div class="row">
            <p class="">Tanggal: {{ $currentDate }}</p>
            <p>Kasir : {{ auth()->user()->getFullname() }}</p>
        </div>

        <hr style="border: 1px solid #000; margin-top: 20px; margin-bottom: 20px;">

        <table class="table table-borderless" style="font-size: 12px"> <!-- Tambahkan kelas table-borderless di sini -->
            @php
                $totalPrice = 0;
            @endphp
            <thead>
                <tr>
                    <th>No</th>
                    <th>Produk</th>
                    <th>Harga Satuan</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orderItems as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->product->name }}</td>
                        <td>Rp{{ number_format($item->price / $item->quantity, 2) }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>Rp{{ number_format($item->price, 2) }}</td>
                    </tr>
                    @php
                        $totalPrice += $item->price; // Tambahkan harga setiap item ke total harga
                    @endphp
                @endforeach
            </tbody>
        </table>

        <hr style="border: 1px solid #000; margin-top: 20px; margin-bottom: 30px;">

        <!-- Tambahkan bagian pembayaran -->
        @php
            $change = $pay->amount - $totalPrice;
        @endphp

        <p class="text-right">Uang Yang Diterima : Rp{{ number_format($pay->amount, 2) }}</p>
        <p class="text-right">Kembalian : Rp{{ number_format($change, 2) }}</p>
        <p class="text-lg text-right font-weight-bold">Total Harga: Rp{{ number_format($totalPrice, 2) }}</p>

        <div class="row mt-5">
            <div class="col-md-12 text-center">
                <p>Terima kasih atas pembeliannya!</p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk27Z3kp6aOG8ifwB6h+kR0JKI" crossorigin="anonymous"></script>
</body>

</html>
