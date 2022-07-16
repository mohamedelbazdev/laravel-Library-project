<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Admin\Hash;
use App\Http\Controllers\Controller;
use App\Models\Rate;
use Illuminate\Http\Request;

class RateController extends Controller
{
    /**
     * @var Rate
     */
    protected $rateModel;

    /**
     * @param Rate $rate
     */
    public function __construct(Rate $rate)
    {
        $this->rateModel = $rate;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id'=>'required',
            'book_id'=>'required',
            'rate'=>'required',
        ]);
        $rate = $this->rateModel->create([
            'user_id'=>$request->user_id,
            'book_id'=>$request->book_id,
            'rate'=>$request->rate,
        ]);

        $rate->save();

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
        $request->validate([
            'user_id'=>'required',
            'book_id'=>'required',
            'rate'=>'required',
        ]);
        $this->rateModel::whereId($id)->update([
            'user_id'=>$request->user_id,
            'book_id'=>$request->book_id,
            'rate'=>$request->rate,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->rateModel::find($id)->delete();
    }
}
