<?php

namespace App\Http\Controllers\Site;
use App\Models\Favourite;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FavouriteController extends Controller
{
    //
    public function index(){
        $favourites=Favourit::where('user_id', Auth::id())->get();
        return view('site.favourite' ,compact('favourites')) ;

    }
}
