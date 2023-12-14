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

        return redirect('/done');
    }

    public function delete(Request $request)
    {
        Reservation::where('id', $request->id)->delete();

        return redirect()->back();
    }

    public function update(ReservationRequest $request, $reservation_id)
    {
        $update_data = [
            'date' => $request->date,
            'time' => $request->time,
            'number' => $request->number,
        ];

        Reservation::find($reservation_id)->update($update_data);
        return redirect()->back()->with('message', '予約内容を変更しました');
    }
}
