<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Booking;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Booking::class, function (Faker $faker) {
    // Carbon::create(year, month, day, hour, minute, second) : 各引数を数字で指定してcarbonを作成
    // Carbon::parse(string) : dbから取得した文字列等をcarbonにする時とかに便利
    $from = Carbon::parse($faker->dateTimeBetween('-1 months', '+1 months'));
    // objectの代入は参照渡しになってしまいaddDaysで$fromの値も変わってしまうため、cloneでobjectをcopyしたものを代入する
    $to = (clone $from)->addDays(random_int(0, 14));
    return [
        'from' => $from,
        'to' => $to,
    ];
});
