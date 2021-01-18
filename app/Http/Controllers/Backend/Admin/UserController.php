<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $User = User::latest()->where('status', 1)->get();
        return view('backend.admin.pages.user-record', compact('User'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
            'name'  =>  'required|max:40',
            'email' =>  'required|email|users:email, email',
            'mobile'   =>   'required|digits:11',
            'user_type' =>  'required'
        ]);

        $User = User::create([
            'name'  =>  $request->name,
            'email' =>  $request->email,
            'phone' =>  $request->mobile,
            'user_type' =>  $request->user_type
        ]);

        return response()->json($User);

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



    // User Deactived
    public function deactivedUser($id){
        $Deactived = User::findOrFail($id)->update([
            'is_approved'   =>  0
        ]);

        if($Deactived){
            $notification = array(
                'message'   =>  'Account Deactived successfull.',
                'alert-type'    =>  'success'
            );

            return redirect()->route('admin.users.index')->with($notification);
        }

    }

    // User Actived
    public function activedUser($id){
        $Actived = User::findOrFail($id)->update([
            'is_approved'   =>  1
        ]);

        if($Actived){
            $notification = array(
                'message'   => 'Account Actived Successfull.',
                'alert-type' => 'success'
            );

            return redirect()->route('admin.users.index')->with($notification);
        }
    }

    // User View
    public function userView($id){
        return "<h1>User View Design</h1>";
    }




}
