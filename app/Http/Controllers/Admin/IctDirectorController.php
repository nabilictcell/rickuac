<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\IctDirector;
use Auth;
class IctDirectorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $director = IctDirector::all();
        return view('admin.ict.director.index')->with(['directors' => $director]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.ict.director.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
        ]);
        $director = new IctDirector();
        $director->title = $request->title;
        $director->detail = $request->detail;

        if ($request->hasFile('image')) {
            $image = $request->image;
            $image_name = time() . $image->getClientOriginalName();
            $image->move('uploads/iqac/director/', $image_name);
            $director->image = "uploads/iqac/director/" . $image_name;
        }
        $director->name = $request->name;
        $director->designation = $request->designation;
        $director->address = $request->address;
        $director->slug = preg_replace('/\s+/u', '-', trim($request->title));
        $director->save();
        $notification = array('message' => 'An Item has been Published Successfully!', 'alert-type' => 'success');
        return redirect('/admin/director')->with($notification);
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
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $director = IctDirector::find($id);
        return view('admin.ict.director.edit')->with(['director' => $director]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
        ]);
        $director = IctDirector::find($id);
        $director->title = $request->title;
        $director->detail = $request->detail;
        if ($request->hasFile('image')) {
            unlink($director->image);
            $image = $request->image;
            $image_name = time() . $image->getClientOriginalName();
            $image->move('uploads/iqac/director/', $image_name);
            $director->image = "uploads/iqac/director/" . $image_name;
        }
        $director->name = $request->name;
        $director->designation = $request->designation;
        $director->address = $request->address;
        $director->slug = preg_replace('/\s+/u', '-', trim($request->title));
        $director->save();
        $notification = array('message' => 'An Item has been Updated Successfully!', 'alert-type' => 'success');
        return redirect('/admin/director')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $director = IctDirector::find($id);
        // unlink($director->image);
        $director->delete();
        $notification = array('message' => 'Selected Item has been Deleted Successfully!', 'alert-type' => 'success');
        return redirect('/admin/director')->with($notification);
    }
}
