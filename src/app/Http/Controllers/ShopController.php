<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Area;
use App\Models\Category;
use App\Models\Favorite;
use Carbon\Carbon;

class ShopController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $shops = Shop::with(['area', 'category'])->get();
        $areas = Area::all();
        $categories = Category::all();

        if( !empty($user))
        {
            $favorites = Favorite::where('user_id', $user->id)->get();

            foreach ($shops as $shop)
            {
                foreach ($favorites as $favorite)
                {
                    if ($shop->id == $favorite->shop_id)
                    {
                        $shop['favorite'] = 1;
                    }
                }
            }
        }

        return view('index', ['user'=>$user, 'shops'=>$shops, 'areas'=>$areas, 'categories'=>$categories]);
    }

    public function search(Request $request)
    {
        $selected_area = $request->area_id;
        $selected_category = $request->category_id;
        $input_keyword = $request->keyword;
        $areas = Area::all();
        $categories = Category::all();
        $shops = Shop::with(['area', 'category'])->AreaSearch($selected_area)->CategorySearch($selected_category)->KeywordSearch($input_keyword)->get();

        return view('index', ['shops'=>$shops, 'areas'=>$areas, 'categories'=>$categories, 'selected_area'=>$selected_area, 'selected_category'=>$selected_category, 'input_keyword'=>$input_keyword]);
    }

    public function detail(Request $request, $shop_id)
    {
        $shop = Shop::with(['area', 'category'])->where('id', $shop_id)->first();
        $areas = Area::all();
        $categories = Category::all();
        $tomorrow = Carbon::tomorrow('Asia/Tokyo')->format('Y-m-d');

        return view('detail', ['shop'=>$shop, 'areas'=>$areas, 'categories'=>$categories, 'tomorrow'=>$tomorrow]);
    }
}
