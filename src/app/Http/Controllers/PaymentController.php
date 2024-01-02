<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use Exception;
use Carbon\Carbon;

class PaymentController extends Controller
{
    public function create($reservation_id)
    {
        $user = auth()->user();
        $reservation = Reservation::with('shop')->where('id', $reservation_id)->first();
        $today = Carbon::today('Asia/Tokyo')->format('Y-m-d');
        if (empty($reservation) || $user->id != $reservation->user_id || $reservation->date < $today || !empty($reservation->payment)) {
            return redirect('/mypage');
        }
        return view('payment', ['reservation' => $reservation]);
    }

    public function store(Request $request, $reservation_id)
    {
        \Stripe\Stripe::setApiKey(config('stripe.stripe_secret_key'));

        try {
            \Stripe\Charge::create([
                'source' => $request->stripeToken,
                'amount' => 1000,
                'currency' => 'jpy',
            ]);
        } catch (Exception $e) {
            return back()->with('flash_alert', '決済に失敗しました(' . $e->getMessage() . ')');
        }

        $update_data = [
            'payment' => 'お支払い済'
        ];
        Reservation::find($reservation_id)->update($update_data);

        return redirect('/payment/done');
    }
}
