<?php

namespace App\Http\Controllers\Api;

use App\Bookable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookableAvailabilityController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($id, Request $request)
    {
        // 通常はvalidation error時にerror msgとredirectが返ってくるので、headerでAccept application/jsonを指定してerror msgをjsonで受け取るようにpostman等で指定する
        $data = $request->validate([
            'from' => 'required|date_format:Y-m-d|after_or_equal:now',
            'to' => 'required|date_format:Y-m-d|after_or_equal:from',
        ]);

        $bookable = Bookable::findOrFail($id);
        // 予約可能ならstatus code 200, そうでないなら404
        return $bookable->availableFor($data['from'], $data['to'])
            // defaultではstatus code 200
            ? response()->json([])
            // 404
            : response()->json([], 404);
    }
}
