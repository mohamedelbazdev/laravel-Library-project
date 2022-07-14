<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Book;
use Illuminate\Support\Facades\DB;

class CatBooksController extends Controller {
    //

    public function category() {
        $category = Category::all();
        return view( 'site.indexCat', compact( 'category' ) );
    }

    public function CatBook( $id ) {
        $catbooks = DB::table( 'books' )->where( 'category_id', $id )->orderBy( 'id', 'desc' )->paginate( 5 );
        return view( 'site.indexCat', compact( 'catbooks' ) );
    }
}
