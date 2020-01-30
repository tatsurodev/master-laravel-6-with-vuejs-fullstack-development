<?php

use App\Bookable;
use App\Booking;
use Illuminate\Database\Seeder;

class BookingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bookable::all()->each(function (Bookable $bookable) {
            $booking = factory(Booking::class)->make();
            // collect helperで配列からcollection作成
            $bookings = collect([$booking]);
            // dd($bookings);
            for ($i = 0; $i < random_int(1, 20); $i++) {
                // $fromはloopの1つ前の$bookingの$fromに1日~14日plus
                $from = (clone $booking->to)->addDays(random_int(1, 14));
                $to = (clone $from)->addDays(random_int(0, 14));
                // $bookingを更新して$bookingsに追加
                $booking = Booking::make([
                    'from' => $from,
                    'to' => $to,
                ]);
                $bookings->push($booking);
            }
            $bookable->bookings()->saveMany($bookings);
        });
    }
}
