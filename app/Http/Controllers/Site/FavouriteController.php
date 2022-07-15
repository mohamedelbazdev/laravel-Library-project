<?php

namespace App\Http\Controllers\Site;
use App\Models\Favourite;
use App\Models\Book;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class FavouriteController extends Controller
{
    //
    public function index(){
        // $favourites=Favourite::where('user_id', Auth::id())->get();
        $favourites=Favourite::where('user_id', 1)->get();
        return view('site.favourite' ,compact('favourites')) ;

    }


    public function add (Request $request)
    {
        // if(Auth::check()){
            $book_id =$request->input('book_id');
            if(Book::find($book_id)){
                $fav= new Favourite();
                $fav->book_id=$book_id;
                // $fav->user_id =Auth::id();
                $fav->user_id =1;
                $fav->save();
                return response()->json(['status'=>"book added to Favourites"]);
            }
            else{
                return response()->json(['status'=>"book is not exist"]);
            }
        // }
        // else{
        //     return responde()->json(['status'=>"login to continue"]);
        // }
        
    }




    public function destroy($id){
        $favourite = Favourite::find($id)->delete();
        return redirect( route( 'site.favourite' ) )->with( 'rmv', 'Category Deleted Successfully' );
    }
}
