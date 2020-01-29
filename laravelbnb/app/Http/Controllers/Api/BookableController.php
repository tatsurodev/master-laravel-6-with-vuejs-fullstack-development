<?php

namespace App\Http\Controllers\Api;

use App\Bookable;
use App\Http\Controllers\Controller;
use App\Http\Resources\BookableIndexResource;
use App\Http\Resources\BookableShowResource;
use Illuminate\Http\Request;

class BookableController extends Controller
{
    public function index()
    {
        // 複数のmodel instanceがtargetとなるのでapi resource classのstatic method, collectionを使う
        return BookableIndexResource::collection(Bookable::all());
    }

    public function show($id)
    {
        // api resource classの引数にtargetのmodel instanceを指定
        return new BookableShowResource(Bookable::findOrFail($id));
    }
}
