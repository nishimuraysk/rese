<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;
use App\Models\Reservation;
use App\Models\Shop;

class UserController extends Controller
{
    public function mypage()
    {
        $user = auth()->user();
        $reservations = Reservation::with('shop')->where('user_id', $user->id)->get();
        $favorites = Favorite::with('shop')->where('user_id', $user->id)->get();

        if( !empty($favorites))
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
}
