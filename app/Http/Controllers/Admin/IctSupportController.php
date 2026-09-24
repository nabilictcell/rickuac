<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\IctActivity;
use DB;

class IctSupportController extends Controller
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
      $activities = DB::table('ict_activities')->get();
      return view('admin.ict.support.index')->with(['activities'=>$activities]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories = DB::table('ict_activities_categories')->get();
        return view('admin.ict.support.create')->with(['categories'=>$categories]);
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
        $ict_activity = new IctActivity();
         if ($request->hasFile('attachment')) {
            $attachment = $request->attachment;
            $file_name = time().'.'.$attachment->getClientOriginalExtension();
            $attachment->move('uploads/iqac/activity/',$file_name);
            $ict_activity->attachment = "uploads/iqac/activity/".$file_name;
          }
        $ict_activity->title = $request->title;
        $ict_activity->detail = $request->detail;
        $ict_activity->category_id = $request->category_id;
        $ict_activity->event_date = $request->event_date;
        $ict_activity->starting_date = $request->starting_date;
        $ict_activity->ending_date = $request->ending_date;
        $ict_activity->event_date = \Carbon\Carbon::createFromTimestamp(strtotime($request->event_date))->format('Y-m-d');
        $ict_activity->starting_date = \Carbon\Carbon::createFromTimestamp(strtotime($request->starting_date))->format('Y-m-d');
        $ict_activity->ending_date = \Carbon\Carbon::createFromTimestamp(strtotime($request->ending_date))->format('Y-m-d');
        $ict_activity->slug = preg_replace('/\s+/u', '-', trim($request->title));
        $ict_activity->save();
        $notification = array('message' => 'Activity has been Published Successfully!', 'alert-type' => 'success');
        return redirect('/admin/support')->with($notification);
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
    public function edit(Request $request,$id)
    {

        $activity = DB::table('ict_activities')->where('id',$id)->first();
        $categories = DB::table('ict_activities_categories')->get();
        return view('admin.ict.support.edit')->with(['categories'=>$categories,'activity'=>$activity]);
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
        $ict_activity =IctActivity::find($id);
        // $old_image = $iqac_activity->image;
        // if ($request->hasFile('image')) {
        //     if(!empty($old_image))
        //     unlink($old_image);
        //     $image = $request->image;
        //     $image_name = time().$image->getClientOriginalName();
        //     $image->move('uploads/iqac/activity/',$image_name);
        //     $iqac_activity->image = "uploads/iqac/activity/".$image_name;
        //   }
           $old_file = $ict_activity->attachment;
        if ($request->hasFile('attachment')) {
            if(!empty($old_file))
            unlink($old_file);
            $attachment = $request->attachment;
            $file_name = time().'.'.$attachment->getClientOriginalExtension();
            $attachment->move('uploads/iqac/activity/',$file_name);
            $ict_activity->attachment = "uploads/iqac/activity/".$file_name;
          }
        $ict_activity->title = $request->title;
        $ict_activity->detail = $request->detail;
        $ict_activity->category_id = $request->category_id;
        $ict_activity->event_date = $request->event_date;
        $ict_activity->starting_date = $request->starting_date;
        $ict_activity->ending_date = $request->ending_date;
        $ict_activity->event_date = \Carbon\Carbon::createFromTimestamp(strtotime($request->event_date))->format('Y-m-d');
        $ict_activity->starting_date = \Carbon\Carbon::createFromTimestamp(strtotime($request->starting_date))->format('Y-m-d');
        $ict_activity->ending_date = \Carbon\Carbon::createFromTimestamp(strtotime($request->ending_date))->format('Y-m-d');
        $ict_activity->slug = preg_replace('/\s+/u', '-', trim($request->title));
        $ict_activity->save();
        $notification = array('message' => 'Activity has been Published Successfully!', 'alert-type' => 'success');
        return redirect('/admin/support')->with($notification);

      }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy(Request $request,$id)
    {
        $activity =IctActivity::find($id);
         $old_file = $activity->attachment;
        // if(!empty($old_image))
        // unlink($old_image);
        $activity->delete();
        $notification = array('message' => 'Selected Item has been Deleted Successfully!', 'alert-type' => 'success');
        return redirect('/admin/support')->with($notification);
    }
    public function convert_date_format(){
      $activities=IctActivity::all();
      foreach($activities as $activity){
        $activity->event_date = \Carbon\Carbon::createFromTimestamp(strtotime($activity->event_date))->format('Y-m-d');
        $activity->starting_date = \Carbon\Carbon::createFromTimestamp(strtotime($activity->starting_date))->format('Y-m-d');
        $activity->ending_date = \Carbon\Carbon::createFromTimestamp(strtotime($activity->ending_date))->format('Y-m-d');
        $activity->save();
      }

    }
}
