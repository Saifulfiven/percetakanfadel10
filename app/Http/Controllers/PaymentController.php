<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Snap;
use App\Models\Payment;

class PaymentController extends Controller
{
    public function createPayment(Request $request)
    {
        // Set konfigurasi Midtrans
        Config::$serverKey = config('services.midtrans.server-key');
        Config::$isProduction = config('services.midtrans.is_production');
        Config::$isSanitized = config('services.midtrans.is_sanitized');
        Config::$is3ds = config('services.midtrans.is_3ds');

        // Simpan transaksi baru
        $payment = new Payment();
        $payment->payment_code = uniqid();
        $payment->user_id = '123456789';
        //$payment->user_id = $request->user()->id;
        //$payment->amount = $request->amount;
        $payment->amount = 1000;
        $payment->status = 'pending';
        $payment->save();

        // Buat parameter pembayaran
        $params = [
            'transaction_details' => [
                'order_id' => $payment->payment_code,
                'gross_amount' => 1000,
            ],
            'customer_details' => [
                // 'first_name' => $request->user()->name,
                // 'email' => $request->user()->email,

                'first_name' => 'Saiful',
                'last_name' => 'fiven',
                'email' => 'saifulfiven@gmail.com',
            ]
        ];
    //return $params;
       // $snapToken = Snap::getSnapToken($params);

        return view('payment');//, ['snap_token' => $snapToken]);
    }

    public function paymentCallback(Request $request)
    {
        // Tangani callback dari Midtrans
        $serverKey = config('services.midtrans.server_key');
        $hashed = hash('sha512', $request->order_id.$request->status_code.$request->gross_amount.$serverKey);

        if ($hashed == $request->signature_key) {
            $payment = Payment::where('payment_code', $request->order_id)->first();
            $payment->status = $request->transaction_status;
            $payment->save();
        }
    }
}
