<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::orderBy('created_at','desc')->get();
        return view('admin.users.index',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
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
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
        ]);
        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=> Hash::make($request->password),
        ]);
        $user->save();
        return redirect( route( 'users.index' ) )->with( 'msg', 'User Added Successfully' );

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
      $edit = User::find($id) ;
      return view( 'admin.users.edit',compact('edit'));
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
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
        ]);
        User::where('id',$id)->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ]);
        return redirect( route( 'users.index' ) )->with( 'msg', 'User Updated Successfully' );
    }


    public function EditProfile()
    {
        return view('site.edit-profile');
    }

    public function updateProfile(Request $request)
    {
        $user_id = Auth::user()->id;
        $user = User::findOrFail($user_id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));

        $user->update();
        return redirect()->back()->with( 'msg', 'User Updated Successfully' );
    }

    public function changeUserStatus(Request $request)
    {
        $users = User::find($request->user_id);
        $users->status = $request->status;
        $users->save();
        return redirect( route( 'users.index' ) )->with( 'msg', 'User Status Updated Successfully' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect( route( 'users.index' ) )->with( 'rmv', 'User has been deleted' );
    }

    public function Inactive($id)
    {
        User::find($id)->update(['status' => 0]);
        return redirect()->back()->with( 'rmv', 'User has been Inactive' );
    }
    public function Active($id)
    {
        User::find($id)->update(['status' => 1]);
        return redirect()->back()->with( 'msg', 'User has been Active' );
    }
}
