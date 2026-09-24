<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\IctInformation;
use DB;
use Auth;

class IctInformationController extends Controller
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
        $informations = DB::table('ict_information')->get();
        return view('admin.ict.information.index')->with(['informations'=>$informations]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ict.information.create');
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
        $information = new IctInformation();
        $information->title = $request->title;
        $information->detail = $request->detail;
        $information->category = $request->category;
        if ($request->hasFile('attachment')) {
            $attachment = $request->attachment;
            $file_name = time().'.'.$attachment->getClientOriginalExtension();
            $attachment->move('uploads/iqac/information/',$file_name);
            $information->attachment = "uploads/iqac/information/".$file_name;
          }
        $information->link = $request->link;
        // $information->order_by_number = $request->order_by_number;
        $information->slug = preg_replace('/\s+/u', '-', trim($request->title));
        $information->save();
        $notification = array('message' => 'An Item has been Published Successfully!', 'alert-type' => 'success');
        return redirect('/admin/information')->with($notification);
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
        $information = IctInformation::find($id);
        return view('admin.ict.information.edit')->with(['information'=>$information]);
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
            'title' => 'required'
        ]);
        $information = IctInformation::find($id);
        $information->title = $request->title;
        $information->detail = $request->detail;
        $information->category = $request->category;
        $old_file = $information->attachment;
        if ($request->hasFile('attachment')) {
            if(!empty($old_file))
            unlink($old_file);
            $attachment = $request->attachment;
            $file_name = time().'.'.$attachment->getClientOriginalExtension();
            $attachment->move('uploads/iqac/information/',$file_name);
            $information->attachment = "uploads/iqac/information/".$file_name;
          }
        $information->link = $request->link;
        // $information->order_by_number = $request->order_by_number;
        $information->slug = preg_replace('/\s+/u', '-', trim($request->title));
        $information->save();
        $notification = array('message' => 'An Item has been Updated Successfully!', 'alert-type' => 'success');
        return redirect('/admin/information')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $information =IctInformation::find($id);
        $old_image = $information->attachment;
        // if(!empty($old_image))
        // unlink($old_image);
        $information->delete();
        $notification = array('message' => 'Selected Item has been Deleted Successfully!', 'alert-type' => 'success');
        return redirect('/admin/information')->with($notification);
    }
}
