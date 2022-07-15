<?php

namespace App\Http\Controllers\Site;
use App\Models\Favourite;
use App\Models\Book;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavouriteController extends Controller
{
    //
    public function index(){
        $favourites=Favourite::where('user_id', Auth::id())->get();
        return view('site.favourite' ,compact('favourites')) ;

    }


    public function add (Request $request)
    {
        // if(Auth::check()){
            // $book_id =$request->input('book_id');
            // if(Book::find($book_id)){
            //     $fav= new Favourite();
            //     $fav->book_id=$book_id;
                // $fav->user_id =Auth::id();
            //     $fav->save();
            //     return response()->json(['status'=>"book added to Favourites"]);
            // }
            // else{
            //     return response()->json(['status'=>"book is not exist"]);
            // }
        // }
        // else{
        //     return responde()->json(['status'=>"login to continue"]);
        // }
        echo("dd");
    }
}
