<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\IctSlider;
use Auth;
class IctSliderController extends Controller
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
        $sliders = IctSlider::all();
        return view('admin.ict.slider.index')->with(['sliders'=>$sliders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ict.slider.create');
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
        $slider = new IctSlider();
        $slider->title = $request->title;
        $slider->detail = $request->detail;
        $slider->link = $request->link;
        if ($request->hasFile('image')) {
            $image = $request->image;
            $image_name = time().$image->getClientOriginalName();
            $image->move('uploads/iqac/slider/',$image_name);
            $slider->image = "uploads/iqac/slider/".$image_name;
          }
        $slider->slug = preg_replace('/\s+/u', '-', trim($request->title));
        $slider->save();
        $notification = array('message' => 'An Item has been Published Successfully!', 'alert-type' => 'success');
        return redirect('/admin/slider')->with($notification);
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
        $slider = IctSlider::find($id);
        return view('admin.ict.slider.edit')->with(['slider'=>$slider]);
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
            'title' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
        ]);
        $slider = IctSlider::find($id);
        $slider->title = $request->title;
        $slider->detail = $request->detail;
        $slider->link = $request->link;
        $old_image = $slider->image;
        if ($request->hasFile('image')) {
            if(!empty($old_image))
            unlink($old_image);
            $image = $request->image;
            $image_name = time().$image->getClientOriginalName();
            $image->move('uploads/iqac/slider/',$image_name);
            $slider->image = "uploads/iqac/slider/".$image_name;
          }
        $slider->slug = preg_replace('/\s+/u', '-', trim($request->title));
        $slider->save();
        $notification = array('message' => 'An Item has been Updated Successfully!', 'alert-type' => 'success');
        return redirect('/admin/slider')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider =IctSlider::find($id);
        $old_image = $slider->image;
        // if(!empty($old_image))
        // unlink($old_image);
        $slider->delete();
        $notification = array('message' => 'Selected Item has been Deleted Successfully!', 'alert-type' => 'success');
        return redirect('/admin/slider')->with($notification);
    }
}
