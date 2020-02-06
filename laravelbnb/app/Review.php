<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['id', 'content', 'rating'];

    public function bookable()
    {
        return $this->belongsTo(Bookable::class);
    }

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    // auto increment無効
    public function getIncrementing()
    {
        return false;
    }

    // primary keyの型指定
    public function getKeyType()
    {
        return 'string';
    }
}
