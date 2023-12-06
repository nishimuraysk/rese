<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Review;
use App\Http\Requests\ReviewRequest;
use Carbon\Carbon;

class ReviewController extends Controller
{
    public function index(Request $request, $reservation_id)
    {
        $user = auth()->user();
        $reservation = Reservation::with('shop')->where('id', $reservation_id)->first();
        $today = Carbon::today('Asia/Tokyo')->format('Y-m-d');
        $review = Review::where('reservation_id', $reservation_id)->first();

        if ( empty($reservation) || $user->id != $reservation->user_id || $reservation->date > $today || !empty($review) )
        {
            return redirect('/mypage');
        }

        return view('review', ['reservation'=>$reservation, 'user'=>$user]);
    }

    public function review(ReviewRequest $request, $reservation_id)
    {
        $create_data = [
            'reservation_id' => $reservation_id,
            'evaluation' => $request->evaluation,
            'comment' => $request->comment,
        ];

        Review::create($create_data);

        return redirect('/mypage/review/done');
    }
}
