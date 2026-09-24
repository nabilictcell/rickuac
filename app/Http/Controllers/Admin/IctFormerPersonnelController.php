<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\IctFormerPersonnel;
use Auth;

class IctFormerPersonnelController extends Controller
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
        $former_personnels = IctFormerPersonnel::all();
        return view('admin.ict.former-personnel.index')->with(['former_personnels'=>$former_personnels]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.ict.former-personnel.create');
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
            'title' => 'required'
        ]);
        $former_personnel = new IctFormerPersonnel();
        $former_personnel->title = $request->title;
        $former_personnel->address = $request->address;
        $former_personnel->designation = $request->designation;
        $former_personnel->from = $request->from;
        $former_personnel->to = $request->to;
        $former_personnel->order_by_number = $request->order_by_number;
        $former_personnel->slug = preg_replace('/\s+/u', '-', trim($request->title));
        $former_personnel->save();
        $notification = array('message' => 'An Item has been Published Successfully!', 'alert-type' => 'success');
        return redirect('/admin/former-personnel')->with($notification);
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
        $former_personnel = IctFormerPersonnel::find($id);
        return view('admin.ict.former-personnel.edit')->with(['former_personnel'=>$former_personnel]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $this->validate($request,[
            'title' => 'required'
        ]);
        $former_personnel = IctFormerPersonnel::find($id);
        $former_personnel->title = $request->title;
        $former_personnel->address = $request->address;
        $former_personnel->designation = $request->designation;
        $former_personnel->from = $request->from;
        $former_personnel->to = $request->to;
        $former_personnel->order_by_number = $request->order_by_number;
        $former_personnel->slug = preg_replace('/\s+/u', '-', trim($request->title));
        $former_personnel->save();
        $notification = array('message' => 'An Item has been Updated Successfully!', 'alert-type' => 'success');
        return redirect('/admin/former-personnel')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $former_personnel =IctFormerPersonnel::find($id);
        $former_personnel->delete();
        $notification = array('message' => 'Selected Item has been Deleted Successfully!', 'alert-type' => 'success');
        return redirect('/admin/former-personnel')->with($notification);
    }
}
