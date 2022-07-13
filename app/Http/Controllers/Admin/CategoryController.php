<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller {
    /**
    * Display a listing of the resource.
    *
    * @return
    */

    public function index() {
        //
        $categories = Category::all();
        return view( 'admin.category.index', compact( 'categories' ) );
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function create() {
        //
        return view( 'admin.category.create' );
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */

    public function store( Request $request ) {
        //
        $this->validate( $request, [
            'Catname' => 'required',
        ] );
        $category = new Category();
        $category->Catname = $request->input( 'Catname' );
        $category->save();
        return redirect( route( 'category.index' ) )->with( 'msg', 'Category Added Successfully' );
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function show( $id ) {
        //
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function edit( $id ) {
        //
        $category = Category::findOrFail($id);
        return view( 'admin.category.edit', compact( 'category' ) );
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function update( Request $request, $id ) {
        //
        $this->validate( $request, [
            'Catname' => 'required',
        ] );
        $category = Category::find( $id );
        $category->Catname = $request->Catname;
        $category->update();
        return redirect( route( 'category.index' ) )->with( 'msg', 'Category Updated Successfully' );

    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function destroy( $id ) {
        //
        DB :: table( 'categories' )->where( 'id', $id )->delete();
        return redirect( route( 'category.index' ) )->with( 'rmv', 'Category Deleted Successfully' );
    }
}
