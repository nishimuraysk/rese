<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Http\Requests\ReservationRequest;

class ReservationController extends Controller
{
    public function create(ReservationRequest $request)
    {
        $create_data = [
            'user_id' => auth()->user()->id,
            'shop_id' => $request->id,
            'date' => $request->date,
            'time' => $request->time,
            'number' => $request->number,
        ];

        Reservation::create($create_data);

        return view('/done');
    }

    public function delete(Request $request)
    {
        Reservation::where('id', $request->id)->delete();

        return redirect()->back();
    }
}
