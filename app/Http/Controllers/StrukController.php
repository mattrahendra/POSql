<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\PDF;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use Illuminate\Support\Facades\DB;

class StrukController extends Controller
{
    public function print($orderId)
    {
        // Ambil data order_items berdasarkan $orderId
        // $orderItems = OrderItem::where('order_id', $orderId)->get();
        $pay = Payment::where('order_id', $orderId)->first();

        $orderItems = OrderItem::with('product')->where('order_id', $orderId)->get();

        // Generate unique ID based on timestamp
        $uniqueId = "Struk";

        // Anda dapat mem-pass data ini ke view struk atau melakukan logika pencetakan di sini
        $currentDate = now()->format('Y-m-d H:i:s');

        // Combine unique ID and current date to create a unique filename
        $filename = $uniqueId . '_' . $currentDate . '.pdf';


        // // Contoh: Mengirim data ke view
        // return view('user.orders.struk', compact('orderItems', 'currentDate', 'pay'));
        $pdf = PDF::loadView('user.orders.struk', compact('orderItems', 'currentDate', 'pay'));

        // Set paper size to A4
        // $pdf->setPaper('a4', 'portrait');

        // Download the PDF file with a specific name
        return $pdf->download($filename);
    }

    public function struk() {
        return view('orders.struk');
    }
}