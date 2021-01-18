<?php

namespace App\Http\Controllers\Backend\Worker;

use App\Http\Controllers\Controller;
use App\Model\Profile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;

class WorkerProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $id = Auth::user()->id;
        $Worker = User::with('profile')->where('id', $id)->first();
        return view('backend.worker.profile.index', compact('Worker'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $request->validate([
            'name'  =>  'required',
            'avatar'  =>  'required|mimes:png,jpg,jpeg',
            'email'  =>  'sometimes|email',
            'address_one'  =>  'required|max:50',
            'address_two'  =>  'sometimes|max:50',
            'postal_code'  =>  'required',
            'country'  =>  'required',
            'city'  =>  'required',
            'phone'  =>  'required|unique:users,phone',
        ]);

        // image upload
        if($request->hasFile('avatar')){
            $img = $request->file('avatar');
            $images = md5(uniqid().time()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(150, 150)->save(public_path('assets/images/profile/'.$images));
        }

        $old_image = $request->old_image;
        if($old_image){
            unlink(public_path('assets/images/profile/'.$old_image));
        }

        $Update = User::findOrFail($id);

        if(empty($Update->profile->worker_id)){

            $infoUpdate = Profile::create([
                'worker_id' =>  $Update->id,
                'address_one'   =>  $request->address_one,
                'address_two'   =>  $request->address_two,
                'postal_code'   =>  $request->postal_code,
                'country'   =>  $request->country,
                'city'   =>  $request->city,
            ]);

            if($infoUpdate){
                User::findOrFail($id)->update([
                    'name'  =>  $request->name,
                    'email'  =>  $request->email,
                    'phone'  =>  $request->phone,
                    'photo'  =>   $images
                ]);

                $notification = array(
                    'message'   =>  'You has been profile updated successfully.',
                    'alert-type'    =>  'success'
                );
                return redirect()->route('worker.profile.index')->with($notification);
            }
        }else{
            $infoUser = User::find($id)->update([
                'name'  =>  $request->name,
                'email'  =>  $request->email,
                'phone'  =>  $request->phone,
                'photo'  =>   $images
            ]);

            if($infoUser){
                Profile::where('worker_id', $Update->profile->worker_id)->update([
                    'address_one'   =>  $request->address_one,
                    'address_two'   =>  $request->address_two,
                    'postal_code'   =>  $request->postal_code,
                    'country'   =>  $request->country,
                    'city'   =>  $request->city,
                ]);

                $notification = array(
                    'message'   =>  'You has been profile updated successfully.',
                    'alert-type'    =>  'success'
                );

                return redirect()->route('worker.profile.index')->with($notification);
            }
        }

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
