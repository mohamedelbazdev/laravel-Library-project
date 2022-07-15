<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(Book $books, Category $categories){
        $this->categories = $categories;
        $this->books = $books;
    }


    public function index()
    {
        // Session::put('book');
        $books = Book::latest()->get();
        return view( 'admin.books.index' , compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->categories->getList();
        return view( 'admin.books.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate( $request, [
            'name' => 'required',
            'desc' => 'required',
            'image' => 'required',
            'author' => 'required',
        ] );
        $book = new Book();
        $book->name = $request['name'];
        $book->desc = $request['desc'];
        $book->category_id = $request['category_id'];
        if ($request->hasFile('image')) {
            $destinationPath = public_path('upload/books/');
            $file = $request['image'];
            $filename = Str::random(5) . '.' . $file->getClientOriginalName();
            $file->move($destinationPath, $filename);
            $book->image = 'upload/books/' . $filename;
        }
        $book->author = $request['author'];
        $book->save();

        // dd($book);

        return redirect('admin/books')->with( 'msg', 'Book Created Successfully' );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $book = Book::findOrFail($id);
        $categories = $this->categories->getList();
        return view( 'admin.books.edit', compact( 'book','categories' ) );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate( $request, [
            'name' => 'required',
            'desc' => 'required',
            'image' => 'required',
            'author' => 'required',
        ] );
        DB::beginTransaction();
        $book = Book::find($id);
        $book->name = $request->name;
        $book->desc = $request->desc;
        $book->category_id =$request->category_id;
           //Update static image of book
           if ($request->hasFile('image')) {
            $old_file = optional($book)->image;
            if (file_exists($old_file)) {
                unlink($old_file);
            }

            $destinationPath = public_path('upload/books/');
            $file = $request['image'];
            $filename = Str::random(5) . '.' . $file->getClientOriginalName();
            $file->move($destinationPath, $filename);
            $book->image = 'upload/books/' . $filename;
        }
        $book->author = $request->author;

        $book->save();
        DB::commit();
        // dd($book);
        $message = ('book updated successfully');
        return redirect('admin/books')->with( 'msg', 'Book Updated Successfully' );;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        DB :: table( 'books' )->where( 'id', $id )->delete();
        return redirect( route( 'books.index' ) )->with( 'rmv', 'book Deleted Successfully' );
    }
}
