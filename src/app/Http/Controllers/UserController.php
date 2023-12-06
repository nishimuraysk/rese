<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;
use App\Models\Reservation;
use App\Models\Shop;
use App\Models\Review;
use Carbon\Carbon;

class UserController extends Controller
{
    public function mypage()
    {
        $yesterday = Carbon::yesterday('Asia/Tokyo')->format('Y-m-d');
        $user = auth()->user();
        $reservations = Reservation::with('shop')->where('user_id', $user->id)->whereDate('date', '>', $yesterday)->orderBy('date', 'asc')->get();
        $favorites = Favorite::with('shop')->where('user_id', $user->id)->get();

        if( !empty($favorites) )
        {
            $shops = Shop::with(['area', 'category'])->get();

            foreach ($favorites as $favorite)
            {
                foreach ($shops as $shop)
                {
                    if ($favorite->shop_id == $shop->id)
                    {
                        $favorite['area'] = $shop['area']['name'];
                        $favorite['category'] = $shop['category']['name'];
                    }
                }
            }
        }

        return view ('mypage' ,['user'=>$user, 'favorites'=>$favorites, 'reservations'=>$reservations ]);
    }

    public function reservation(Request $request, $reservation_id)
    {
        $user = auth()->user();
        $reservation = Reservation::with('shop')->where('id', $reservation_id)->first();
        $tomorrow = Carbon::tomorrow('Asia/Tokyo')->format('Y-m-d');

        if ( empty($reservation) || $user->id != $reservation->user_id )
        {
            return redirect('/mypage');
        }

        return view('reservation_update', ['reservation'=>$reservation, 'tomorrow'=>$tomorrow, 'user'=>$user]);
    }

    public function history()
    {
        $today = Carbon::today('Asia/Tokyo')->format('Y-m-d');
        $user = auth()->user();
        $reservations = Reservation::with('shop')->where('user_id', $user->id)->whereDate('date', '<', $today)->orderBy('date', 'asc')->get();
        $reviews = Review::all();

        foreach ( $reservations as $reservation )
            {
                foreach ( $reviews as $review )
                {
                    if ( $reservation->id == $review->reservation_id )
                    {
                        $reservation['review'] = 1;
                    }
                }
            }

        return view ('history' ,['user'=>$user, 'reservations'=>$reservations]);
    }
}
