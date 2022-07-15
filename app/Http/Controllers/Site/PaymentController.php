<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use App\Models\Book;

class PaymentController extends Controller {
    //

    public function index() {
        $payments = Payment::where( 'user_id', '=', Auth::id() );
        return view( 'site.payment', compact( 'payments' ) );
    }

    public function add ( Request $request ) {
        // if ( Auth::check() ) {
        $book_id = $request->input( 'book_id' );
        if ( Book::find( $book_id ) ) {
            $paid = new Payment();
            $paid->book_id = $book_id;
            $paid->user_id = Auth::id();
            $paid->save();
            return response()->json( [ 'status'=>'book added to paid' ] );
        } else {
            return response()->json( [ 'status'=>'book is not exist' ] );
        }

    }

    public function destroy( $id ) {
        $paid = Payment::find( $id )->delete();
        return redirect( route( 'site.payment' ) )->with( 'rmv', 'Category Deleted Successfully' );
    }

}
