<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\IctQuicklink;
use Auth;
class IctQuicklinksController extends Controller
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
        $quicklinks = IctQuicklink::all();
        return view('admin.ict.quicklinks.index')->with(['quicklinks'=>$quicklinks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ict.quicklinks.create');
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
        $quicklink = new IctQuicklink();
        $quicklink->title = $request->title;
        $quicklink->link = $request->link;
        $quicklink->save();
        $notification = array('message' => 'An Item has been Published Successfully!', 'alert-type' => 'success');
        return redirect('/admin/quicklinks')->with($notification);
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
        $quicklink = IctQuicklink::find($id);
        return view('admin.ict.quicklinks.edit')->with(['quicklink'=>$quicklink]);
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
        $this->validate($request,['title' => 'required']);
        $quicklink = IctQuicklink::find($id);
        $quicklink->title = $request->title;
        $quicklink->link = $request->link;
        $quicklink->save();
        $notification = array('message' => 'An Item has been Updated Successfully!', 'alert-type' => 'success');
        return redirect('/admin/quicklinks')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $quicklink =IctQuicklink::find($id);
        $quicklink->delete();
        $notification = array('message' => 'Selected Item has been Deleted Successfully!', 'alert-type' => 'success');
        return redirect('/admin/quicklinks')->with($notification);
    }
}
