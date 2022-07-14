<?php

namespace App\Http\Controllers\Site;
use App\Models\Book;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class SiteBookController extends Controller {
    //

    public function books() {
        $books = Book::paginate( '6' );
        return view( 'site.index', compact( 'books' ) );
    }

}
