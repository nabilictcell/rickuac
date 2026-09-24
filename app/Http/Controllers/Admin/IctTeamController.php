<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\IctTeam;
use Auth;
class IctTeamController extends Controller
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
        $teams = IctTeam::all();
        return view('admin.ict.team.index')->with(['teams'=>$teams]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.ict.team.create');
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
            'title' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
        ]);
        $team = new IctTeam();
        $team->title = $request->title;
        $team->detail = $request->detail;
        $team->category = $request->category;
        if ($request->hasFile('image')) {
            $image = $request->image;
            $image_name = time().$image->getClientOriginalName();
            $image->move('uploads/iqac/team/',$image_name);
            $team->image = "uploads/iqac/team/".$image_name;
          }
        $team->order_by_number = $request->order_by_number;
        $team->slug = preg_replace('/\s+/u', '-', trim($request->title));
        $team->save();
        $notification = array('message' => 'An Item has been Published Successfully!', 'alert-type' => 'success');
        return redirect('/admin/team')->with($notification);
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

        $team = IctTeam::find($id);
        return view('admin.ict.team.edit')->with(['team'=>$team]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {

        $this->validate($request,[
            'title' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
        ]);
        $team = IctTeam::find($id);
        $old_image = $team->image;
        $team->title = $request->title;
        $team->detail = $request->detail;
        $team->category = $request->category;
        if ($request->hasFile('image')) {
            if(!empty($old_image))
            unlink($old_image);
            $image = $request->image;
            $image_name = time().$image->getClientOriginalName();
            $image->move('uploads/iqac/team/',$image_name);
            $team->image = "uploads/iqac/team/".$image_name;
          }
        $team->order_by_number = $request->order_by_number;
        $team->slug = preg_replace('/\s+/u', '-', trim($request->title));
        $team->save();
        $notification = array('message' => 'An Item has been Updated Successfully!', 'alert-type' => 'success');
        return redirect('/admin/team')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $team =IctTeam::find($id);
        // if(!empty($team->image))
        // {
        //     unlink($team->image);
        // }
        $team->delete();
        $notification = array('message' => 'Selected Item has been Deleted Successfully!', 'alert-type' => 'success');
        return redirect('/admin/team')->with($notification);
    }
}
