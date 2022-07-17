<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Payment;
use App\Traits\ApiResponseTrait;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PaymentController extends Controller
{
    use ApiResponseTrait;

    /**
     * @var Payment
     */
    protected $paymentModel;

    /**
     * @var Book
     */
    protected $bookModel;

    /**
     * @param Payment $payment
     * @param Book $book
     */
    public function __construct(Payment $payment, Book $book)
    {
        $this->paymentModel = $payment;
        $this->bookModel = $book;
    }

    /**
     * @return Application|ResponseFactory|Response
     */
    public function getPayedBook()
    {
        $books = $this->bookModel::whereHas('payments', function ($query) {

            $query->where('user_id', Auth::id());

        })->get();

        return $this->apiResponse('successfully', $books);
    }

    /**
     * @param Request $request
     * @return Application|ResponseFactory|Response
     */
    public function purchaseBook(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'book_id' => 'required|exists:books,id',
        ]);

        if ($validator->fails()) {
            return $this->apiResponseValidation($validator);
        }

        $pay = $this->paymentModel->create([
            'book_id' => $request->post('book_id'),
            'user_id' => Auth::id()
        ]);

        return $this->apiResponse('successfully', $pay);
    }
}
