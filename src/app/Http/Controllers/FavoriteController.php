<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;

class FavoriteController extends Controller
{
    public function create(Request $request)
    {
        $create_data = [
            'user_id' => auth()->user()->id,
            'shop_id' => $request->id,
        ];

        Favorite::create($create_data);

        return redirect()->back();
    }

    public function delete(Request $request)
    {
        Favorite::where('user_id', auth()->user()->id)->where('shop_id', $request->id)->delete();

        return redirect()->back();
    }
}
