<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
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
