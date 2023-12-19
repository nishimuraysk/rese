<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Area;
use App\Models\Category;
use App\Models\Favorite;
use App\Models\Representative;
use App\Models\Reservation;
use App\Http\Requests\ShopRequest;
use Carbon\Carbon;

class ShopController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $shops = Shop::with(['area', 'category'])->get();
        $areas = Area::all();
        $categories = Category::all();

        if (!empty($user)) {
            $representative = Representative::where('user_id', $user->id)->first();
            $favorites = Favorite::where('user_id', $user->id)->get();

            foreach ($shops as $shop) {
                foreach ($favorites as $favorite) {
                    if ($shop->id == $favorite->shop_id) {
                        $shop['favorite'] = 1;
                    }
                }
            }

            return view('index', ['user' => $user, 'shops' => $shops, 'areas' => $areas, 'categories' => $categories, 'representative' => $representative]);
        }

        return view('index', ['shops' => $shops, 'areas' => $areas, 'categories' => $categories]);
    }

    public function search(Request $request)
    {
        $selected_area = $request->area_id;
        $selected_category = $request->category_id;
        $input_keyword = $request->keyword;
        $areas = Area::all();
        $categories = Category::all();
        $shops = Shop::with(['area', 'category'])->AreaSearch($selected_area)->CategorySearch($selected_category)->KeywordSearch($input_keyword)->get();

        return view('index', ['shops' => $shops, 'areas' => $areas, 'categories' => $categories, 'selected_area' => $selected_area, 'selected_category' => $selected_category, 'input_keyword' => $input_keyword]);
    }

    public function detail($shop_id)
    {
        $shop = Shop::with(['area', 'category'])->where('id', $shop_id)->first();
        $areas = Area::all();
        $categories = Category::all();
        $tomorrow = Carbon::tomorrow('Asia/Tokyo')->format('Y-m-d');

        return view('detail', ['shop' => $shop, 'areas' => $areas, 'categories' => $categories, 'tomorrow' => $tomorrow]);
    }

    public function shop()
    {
        $user = auth()->user();
        $role_id = $user->role_id;
        $user_id = $user->id;
        $areas = Area::all();
        $categories = Category::all();
        $representative = Representative::where('user_id', $user_id)->first();

        if ($role_id == 3 && empty($representative)) {
            return view('shop_create', ['areas' => $areas, 'categories' => $categories]);
        } else {
            return redirect('/');
        }
    }

    public function create(ShopRequest $request)
    {
        $shop_create_data = [
            'name' => $request->name,
            'area_id' => $request->area,
            'category_id' => $request->category,
            'summary' => $request->summary,
            'image' => $request->image,
        ];

        Shop::create($shop_create_data);

        $shop_id = Shop::latest()->first()->id;
        $user_id = auth()->user()->id;

        $latest_shop_id = Shop::latest()->first()->id;
        $file_name = $latest_shop_id . ".jpg";
        $request->file('image')->storeAs('public', $file_name);
        $update_file_name = "/storage/" . $file_name;

        $shop_update_data = [
            'name' => $request->name,
            'area_id' => $request->area,
            'category_id' => $request->category,
            'summary' => $request->summary,
            'image' => $update_file_name,
        ];

        Shop::find($shop_id)->update($shop_update_data);

        $representative_create_data = [
            'user_id' => $user_id,
            'shop_id' => $shop_id,
        ];

        Representative::create($representative_create_data);

        return redirect('/shop/done');
    }

    public function renew($shop_id)
    {
        $user = auth()->user();
        $role_id = $user->role_id;
        $user_id = $user->id;
        $shop = Shop::with(['area', 'category'])->where('id', $shop_id)->first();
        $areas = Area::all();
        $categories = Category::all();
        $representative = Representative::where('user_id', $user_id)->first();

        if ($role_id == 3 && !empty($representative) && $shop_id == $representative->shop_id) {
            return view('shop_update', ['shop' => $shop, 'areas' => $areas, 'categories' => $categories]);
        } else {
            return redirect('/');
        }
    }

    public function update(ShopRequest $request, $shop_id)
    {
        $file_name = $shop_id . ".jpg";

        if (!empty($request->image)) {
            $request->file('image')->storeAs('public', $file_name);
        }

        $update_file_name = "/storage/" . $file_name;

        $update_data = [
            'name' => $request->name,
            'area_id' => $request->area,
            'category_id' => $request->category,
            'summary' => $request->summary,
            'image' => $update_file_name,
        ];

        Shop::find($shop_id)->update($update_data);
        return redirect()->back()->with('message', '店舗情報を変更しました');
    }

    public function representative($shop_id)
    {
        $shop = Shop::with(['area', 'category'])->where('id', $shop_id)->first();
        $reservations = Reservation::with('user')->where('shop_id', $shop_id)->get();

        return view('representative_reservation', ['shop' => $shop, 'reservations' => $reservations]);
    }
}
