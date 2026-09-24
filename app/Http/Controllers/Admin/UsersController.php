<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
use Validator;
class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.index')->with('users',User::all());
    }
    
    
    public function profile()
  {
     $id = Auth::user()->id;
     $user = User::where('id',$id)->first();
     return view('admin.user.profile',compact('user',$user));
  }
  
  
    public function profile_update(Request $request)

  {
    $this->validate($request,
               [
                   'password' => 'required|min:6|confirmed',
                   'password_confirmation' => 'required|min:6'
               ]
           );


    $id = Auth::user()->id;
    $user = User::where('id',$id)->first();
    $user->name = $request->name;
    $user->email =$request->email;
    $user->password = Hash::make($request->password);
    $user->save();
    $notification = array('message' => 'Profile has been  updated Successfully!', 'alert-type' => 'success');
   

    return redirect('/admin/profile')->with($notification);
     


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
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email'
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt(123456)
        ]);
        $profile = Profile::create([
            'user_id' => $user->id,
            'avatar' => 'uploads/users/avatar.png',
            'about' => 'Coming Soon...'
        ]);
        $notification = array('message' => 'User Created Successfully!', 'alert-type' => 'success');
        return redirect()->route('user.index')->with($notification);
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
}
