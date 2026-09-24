<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\activity\Facades\Auth;
use App\Models\NewActivity;
use DB;

class IctActivityController extends Controller
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
      $activities = DB::table('new_activity')->get();
      return view('admin.ict.activity.index')->with(['activities'=>$activities]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories = DB::table('new_activity_categories')->get();
        return view('admin.ict.activity.create')->with(['categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    $this->validate($request, [
        'title' => 'required'
    ]);

    // Create an array with the data to be inserted
    $activityData = [
        'title' => $request->title,
        'detail' => $request->detail,
        'category_id' => $request->category_id,
        'event_date' => \Carbon\Carbon::createFromTimestamp(strtotime($request->event_date))->format('Y-m-d'),
        'starting_date' => \Carbon\Carbon::createFromTimestamp(strtotime($request->starting_date))->format('Y-m-d'),
        'ending_date' => \Carbon\Carbon::createFromTimestamp(strtotime($request->ending_date))->format('Y-m-d'),
        'slug' => preg_replace('/\s+/u', '-', trim($request->title))
    ];

    // Check if the attachment file is present
    if ($request->hasFile('attachment')) {
        $attachment = $request->attachment;
        $file_name = time().'.'.$attachment->getClientOriginalExtension();
        $attachment->move('uploads/iqac/activity/', $file_name);
        $activityData['attachment'] = "uploads/iqac/activity/" . $file_name;
    }

    // Insert the data into the 'new_activity' table
    DB::table('new_activity')->insert($activityData);

    $notification = array('message' => 'Activity has been Published Successfully!', 'alert-type' => 'success');
    return redirect('/admin/activity')->with($notification);
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

        $activity = DB::table('new_activity')->where('id',$id)->first();
        $categories = DB::table('new_activity_categories')->get();
        return view('admin.ict.activity.edit')->with(['categories'=>$categories,'activity'=>$activity]);
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
        $this->validate($request, [
            'title' => 'required'
        ]);

        $old_file = DB::table('new_activity')->find($id)->attachment;

        $dataToUpdate = [
            'title' => $request->title,
            'detail' => $request->detail,
            'category_id' => $request->category_id,
            'event_date' => \Carbon\Carbon::createFromTimestamp(strtotime($request->event_date))->format('Y-m-d'),
            'starting_date' => \Carbon\Carbon::createFromTimestamp(strtotime($request->starting_date))->format('Y-m-d'),
            'ending_date' => \Carbon\Carbon::createFromTimestamp(strtotime($request->ending_date))->format('Y-m-d'),
            'slug' => preg_replace('/\s+/u', '-', trim($request->title))
        ];

        if ($request->hasFile('attachment')) {
            if (!empty($old_file)) {
                unlink($old_file);
            }

            $attachment = $request->attachment;
            $file_name = time() . '.' . $attachment->getClientOriginalExtension();
            $attachment->move('uploads/iqac/activity/', $file_name);

            $dataToUpdate['attachment'] = "uploads/iqac/activity/" . $file_name;
        }

        DB::table('new_activity')->where('id', $id)->update($dataToUpdate);

        $notification = [
            'message' => 'Activity has been Published Successfully!',
            'alert-type' => 'success'
        ];

        return redirect('/admin/activity')->with($notification);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $affected = DB::table('new_activity')->where('id', $id)->delete();

        if ($affected) {
            // The record was deleted successfully
            $notification = array('message' => 'Selected Item has been Deleted Successfully!', 'alert-type' => 'success');
            return redirect('/admin/activity')->with($notification);
        } else {
            // Handle the case where the record was not found or not deleted
            $notification = array('message' => 'Failed to delete the item!', 'alert-type' => 'error');
            return redirect('/admin/activity')->with($notification);
        }
    }

    public function convert_date_format()
    {
        $activities = DB::table('new_activity')->get();

        foreach ($activities as $activity) {
            $activity->event_date = \Carbon\Carbon::createFromTimestamp(strtotime($activity->event_date))->format('Y-m-d');
            $activity->starting_date = \Carbon\Carbon::createFromTimestamp(strtotime($activity->starting_date))->format('Y-m-d');
            $activity->ending_date = \Carbon\Carbon::createFromTimestamp(strtotime($activity->ending_date))->format('Y-m-d');
        }

        // Update the records
        DB::table('new_activity')->whereIn('id', $activities->pluck('id'))->update($activities->toArray());
    }

}
