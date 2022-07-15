<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Book;
use Illuminate\Http\Request;

class PagesController extends Controller {
    //

    public function viewCategory( $id ) {
        $category = Category::find( $id );
        $books = $category->books;
        return view( 'site.viewcategory' )->with( [ 'books'=> $books, 'category'=>$category ] );

    }

    public function viewBook( $id ) {
        $book = Book::find( $id );
        return view( 'site.book' )->with( [ 'book'=> $book ] );
    }
}
