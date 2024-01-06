<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Shop;
use App\Models\Representative;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RepresentativeController extends Controller
{
    public function index()
    {
        $shops = Shop::all();
        $representatives = Representative::all();

        foreach ($shops as $shop) {
            foreach ($representatives as $representative) {
                if ($shop->id == $representative->shop_id) {
                    $shop['representative'] = 1;
                }
            }
        }

        $user = auth()->user();
        $role_id = $user->role_id;

        if ($role_id == 2) {
            return view('representative', ['shops' => $shops]);
        } else {
            return redirect('/');
        }
    }

    public function create(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'shop_id' => ['unique:' . Representative::class],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id,
        ]);

        event(new Registered($user));

        if (!empty($request->shop_id)) {
            $user_id = User::latest()->first()->id;
            $shop_id = $request->shop_id;

            $representative_create_data = [
                'user_id' => $user_id,
                'shop_id' => $shop_id,
            ];

            Representative::create($representative_create_data);
        }

        return redirect("/representative/done");
    }

    public function select()
    {
        $user = auth()->user();
        $role_id = $user->role_id;

        if ($role_id == 2) {
            return view('select');
        } else {
            return redirect('/');
        }
    }
}
