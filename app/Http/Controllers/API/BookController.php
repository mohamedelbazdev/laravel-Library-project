<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    use ApiResponseTrait;

    /**
     * @var Book
     */
    protected $bookModel;

    /**
     * @param Book $book
     */
    public function __construct(Book $book)
    {
        $this->bookModel = $book;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    public function search(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
        ]);

        if ($validator->fails()) {
            return $this->apiResponseValidation($validator);
        }

        $books = $this->bookModel->where('name', 'like', '%' . $request->post('name') . '%')->get();

        return $this->apiResponse('successfully', $books);
    }

    public function getFavoriteBook()
    {
        $books = $this->bookModel::whereHas('favorites', function ($query) {

            $query->where('user_id', Auth::id());

        })->get();

        return $this->apiResponse('successfully', $books);
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'book_id' => 'required|exists:books,id',
        ]);

        if ($validator->fails()) {
            return $this->apiResponseValidation($validator);
        }

        $book = $this->bookModel->find($request->post('book_id'));

        return $this->apiResponse('successfully', $book);
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
    }
}
