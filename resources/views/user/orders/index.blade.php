@extends('user.layouts.admin')

@section('title', 'Laporan')
@section('content-header', 'List Pesanan')
@section('content-actions')
    <a href="{{ route('user.cart.index') }}" class="btn btn-primary">Buka Transaksi</a>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 col-sm-6"></div>
                <div class="col-md-5 col-sm-5">
                    <form action="{{ route('orders.index') }}">
                        <div class="row">
                            <div class="col-md-5">
                                <input type="date" name="start_date" class="form-control"
                                    value="{{ request('start_date') }}" />
                            </div>
                            <div class="col-md-5">
                                <input type="date" name="end_date" class="form-control"
                                    value="{{ request('end_date') }}" />
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-outline-primary" type="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <table class="table table-responsive-sm table-responsive-xl table-responsive-lg">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Pembeli</th>
                        <th>Pendapatan</th>
                        <th>Uang Diterima</th>
                        <th>Status</th>
                        <th>Kembalian</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        @if (
                            $order->user_id ==
                                auth()->user()->getId())
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $order->getCustomerName() }}</td>
                                <td>{{ config('settings.currency_symbol') }} {{ $order->formattedTotal() }}</td>
                                <td>{{ config('settings.currency_symbol') }} {{ $order->formattedReceivedAmount() }}</td>
                                <td>
                                    @if ($order->receivedAmount() == 0)
                                        <span class="badge badge-danger">Tidak Bayar</span>
                                    @elseif($order->receivedAmount() < $order->total())
                                        <span class="badge badge-warning">Ngutang</span>
                                    @elseif($order->receivedAmount() == $order->total())
                                        <span class="badge badge-success">Bayar</span>
                                    @elseif($order->receivedAmount() > $order->total())
                                        <span class="badge badge-info">Kembalian</span>
                                    @endif
                                </td>
                                <td>{{ config('settings.currency_symbol') }}
                                    {{ number_format($order->total() - $order->receivedAmount(), 2) }}</td>
                                <td>{{ $order->created_at }}</td>
                                <td>
                                    <a href="{{ route('orders.print', ['orderId' => $order->id]) }}"
                                        class="btn-sm btn-success" target="_blank"><i class="fas fa-print"></i></a>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th></th>
                        <th></th>
                        @php
                            $total = 0;
                            $receivedAmount = 0;
                        @endphp
                        @foreach ($orders as $order)
                            @if (
                                $order->user_id ==
                                    auth()->user()->getId())
                                <!-- Calculate total and receivedAmount here -->
                                @php
                                    $total += $order->total();
                                    $receivedAmount += $order->receivedAmount();
                                @endphp
                            @endif
                        @endforeach
                        <th>{{ config('settings.currency_symbol') }} {{ number_format($total, 2) }}</th>
                        <th>{{ config('settings.currency_symbol') }} {{ number_format($receivedAmount, 2) }}</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
            {{ $orders->render() }}
        </div>
    </div>
@endsection
