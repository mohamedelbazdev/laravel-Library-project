<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
class admincontroller extends Controller
{
    public function index()
    {

        $adminsFromDB = Admin::all();
        return view("admins.admin", [
            'allAdmins' => $adminsFromDB
        ]);

    }
    public function show($admin)
    {
        $admin = admin::find($admin);
        return view('admins.show', [
            'admin' => $admin
        ]);
    }

    public function create()
    {
        return view('admins.create');
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $admins = new Admin();
        $admins->f_name = $request->f_name;
        $admins->last_name = $request->last_name;
        $admins->email = $request->email;
        $admins->password = $request->password;
        $admins->biography = $request->biography;



        $admins->save();

        return redirect()->route('admins.index');
    }






    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $edit = admin::find($id) ;
        // return view( 'admins.edit',compact('edit'));
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
        // $this->validate([
        //     'f_name'=>'required',
        //     'last_name'=>'required',
        //     // 'email'=>'required',
        //     'password'=>'required',
        //     'biography'=>'required',
        // ]);
        // $admins = admin::create([


        //     'f_name'=>$request->f_name,
        //     'last_name'=>$request->last_name,
        //     'email'=>$request->email,
        //     'password'=>$request->password,
        //     'biography'=>$request->biography,
        // ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     // admin::find($id)->delete();
    //     // return redirect( route( 'admin.destroy' ) )->with( 'rmv', 'User has been deleted' );

    //     //
    //     // $admin = admin::find($admin);
    //     // return view('admins.show', [
    //     //     'admin' => $admin
    //     // ]);
    // }
    public function destroy($id)
    {
        return "jgfgjfg";
        // admin::find($id)->delete();
        // return redirect( route( 'admins.index' ) )->with( 'rmv', 'User has been deleted' );
    }





}
