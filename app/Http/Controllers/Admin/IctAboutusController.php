<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\IctAboutus;
use Auth;
class IctAboutusController extends Controller
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
        $abouts = IctAboutus::all();
        return view('admin.ict.about-us.index')->with(['abouts'=>$abouts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.ict.about-us.create');
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
        $about = new IctAboutus();
        $about->title = $request->title;
        $about->detail = $request->detail;
        $about->category = $request->category;
        $about->link = $request->link;
        $about->slug = preg_replace('/\s+/u', '-', trim($request->title));
        $about->save();
        $notification = array('message' => 'An Item has been Published Successfully!', 'alert-type' => 'success');
        return redirect('/admin/about-us')->with($notification);
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

        $about = IctAboutus::find($id);
        return view('admin.ict.about-us.edit')->with(['about'=>$about]);
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

        $this->validate($request,[
            'title' => 'required'
        ]);
        $about = IctAboutus::find($id);
        $about->title = $request->title;
        $about->detail = $request->detail;
        $about->category = $request->category;
        $about->link = $request->link;
        $about->slug = preg_replace('/\s+/u', '-', trim($request->title));
        $about->save();
        $notification = array('message' => 'An Item has been Updated Successfully!', 'alert-type' => 'success');
        return redirect('/admin/about-us')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $about =IctAboutus::find($id);
        $about->delete();
        $notification = array('message' => 'Selected Item has been Deleted Successfully!', 'alert-type' => 'success');
        return redirect('/admin/about-us')->with($notification);
    }
}
