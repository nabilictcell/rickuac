<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\IctGallery;
use DB;
use Auth;

class IctGalleryController extends Controller
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
        $galleries = IctGallery::all();
        return view('admin.ict.gallery.index')->with(['galleries'=>$galleries]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ict.gallery.create');
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
        $gallery = new IctGallery();
        $gallery->title = $request->title;
        $gallery->category = $request->category;
        if ($request->hasFile('image')) {
            $image = $request->image;
            $image_name = time().$image->getClientOriginalName();
            $image->move('uploads/iqac/gallery/',$image_name);
            $gallery->image = "uploads/iqac/gallery/".$image_name;
          }
        $gallery->order = $request->order;
        $gallery->slug = preg_replace('/\s+/u', '-', trim($request->title));
        $gallery->save();
        $notification = array('message' => 'An Item has been Published Successfully!', 'alert-type' => 'success');
        return redirect('/admin/gallery')->with($notification);
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
        $gallery = IctGallery::find($id);
        return view('admin.ict.gallery.edit')->with(['gallery'=>$gallery]);
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
        $gallery = IctGallery::find($id);
        $gallery->title = $request->title;
        $gallery->category = $request->category;
        if ($request->hasFile('image')) {
            unlink($gallery->image);
            $image = $request->image;
            $image_name = time().$image->getClientOriginalName();
            $image->move('uploads/iqac/gallery/',$image_name);
            $gallery->image = "uploads/iqac/gallery/".$image_name;
          }
        $gallery->slug = preg_replace('/\s+/u', '-', trim($request->title));
        $gallery->order = $request->order;
        $gallery->save();
        $notification = array('message' => 'An Item has been Updated Successfully!', 'alert-type' => 'success');
        return redirect('/admin/gallery')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gallery =IctGallery::find($id);
        // unlink($gallery->image);
        $gallery->delete();
        $notification = array('message' => 'Selected Item has been Deleted Successfully!', 'alert-type' => 'success');
        return redirect('/admin/gallery')->with($notification);
    }
}
