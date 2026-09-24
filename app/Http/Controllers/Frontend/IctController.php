<?php

namespace App\Http\Controllers\Frontend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\IctAboutus;
use App\Models\IctSlider;
use App\Models\IctDirector;
use App\Models\IctGallery;
use App\Models\IctTeam;
use App\Models\IctActivity;
use App\Models\IctInformation;
use App\Models\IctFormerPersonnel;
use App\Models\citizenCharter;
use App\Models\NewActivity;
use Illuminate\Support\Facades\DB;

class IctController extends Controller
{
    public function index()
    {
        $sliders = IctSlider::take(3)->get();
        $director = IctDirector::first();
        $galleries = IctGallery::orderBy('order', 'asc')->get();
        $teams = IctTeam::all();
        $training = DB::table('new_activity')->where('category_id',1)->take(4)->orderby('id','DESC')->get();
        $workshop = DB::table('new_activity')->where('category_id',3)->take(4)->orderby('id','DESC')->get();

        // $seminar = DB::table('new_activity')->where('category_id',3)->first();
        // $meeting = IctActivity::where('category_id',4)->first();
        // $visit = IctActivity::where('category_id',5)->first();
        // $plagiarism_check = IctActivity::where('category_id',6)->first();
        // $more = IctActivity::where('category_id',7)->first();
    	return view('frontend.index')
        ->with(['sliders'=>$sliders])
        ->with(['director'=>$director])
        ->with(['teams'=>$teams])
        ->with(['training'=>$training])
        ->with(['workshop'=>$workshop])
        // ->with(['seminar'=>$seminar])
        // ->with(['meeting'=>$meeting])
        // ->with(['visit'=>$visit])
        // ->with(['plagiarism_check'=>$plagiarism_check])
        // ->with(['more'=>$more])
        ->with(['galleries'=>$galleries]);
    }
    public function get_all_about_us($category_name){
        $category = str_replace('-', ' ', $category_name);
        $category = ucwords($category);
        $category = str_replace('And', 'and', $category);
        $about = IctAboutus::where('category',$category)->first();
        return view('frontend.about-us')->with(['about'=>$about,'category'=>$category]);
    }
    public function ict_new_activity($id){

        $activity = DB::table('new_activity')->where('category_id',$id)->orderBy('id', 'desc')->simplePaginate(5000);
        $category = DB::table('new_activity_categories')->where('id',$id)->first();
        return view('frontend.new_activity')->with(['activity'=>$activity,'category'=>$category]);
    }
    public function ict_newactivity_details($slug){
        $item = DB::table('new_activity')->where('slug',$slug)->first();
        return view('frontend.new_activity_details')->with(['item'=>$item,'slug'=>$slug]);
    }
    public function get_all_activity($id){

        $activities = IctActivity::where('category_id',$id)->orderBy('event_date', 'desc')->simplePaginate(5000);
        $category = DB::table('ict_activities_categories')->where('id',$id)->first();
        return view('frontend.all-activity')->with(['activities'=>$activities,'category'=>$category]);
    }
    public function get_activity_details($slug){
        $item = IctActivity::where('slug',$slug)->first();
        return view('frontend.activity_details')->with(['item'=>$item,'slug'=>$slug]);
    }
    public function get_director_details(){
        $director = IctDirector::where('designation', 'Director')->first();
        return view('frontend.director')->with(['director'=>$director]);
    }
    public function get_all_team_member($type){
        $category = str_replace('-', ' ', $type);
        $category = ucwords($category);
        $teams = IctTeam::where('category',$category)->orderBy('order_by_number', 'asc')->get();
        return view('frontend.team')->with(['teams'=>$teams,'category'=>$category]);
    }
    public function get_team_details($slug){
        $teams = IctTeam::where('slug',$slug)->first();
        return view('frontend.team_details')->with(['teams'=>$teams,'slug'=>$slug]);
    }
    public function get_all_former_personnel(){
        $former_personnels = IctFormerPersonnel::orderBy('order_by_number', 'asc')->get();
        return view('frontend.former_personnel')->with(['former_personnels'=>$former_personnels]);
    }
    public function get_all_information($type){
        //$category = str_replace('-', ' ', $type);
        $category = ucwords($type);
        $informations = IctInformation::where('category',$category)->orderBy('id', 'desc')->simplePaginate(5000);
        return view('frontend.information')->with(['informations'=>$informations,'category'=>$category,'infotype'=>$type]);
    }
    public function get_information_details($infotype,$slug){
        $item = IctInformation::where('slug',$slug)->first();
        $infotype = ucwords($infotype);
        return view('frontend.information_details')->with(['item'=>$item,'slug'=>$slug,'infotype'=>$infotype]);
   }
   public function get_all_gallery(){
    $galleries = IctGallery::orderBy('order', 'desc')->get();
    return view('frontend.gallery')->with(['galleries'=>$galleries]);
   }
   public function citizen_charter($slug)
   {

       $citizencharter=CitizenCharter::where('slug',$slug)->get();
       return view('frontend.citizen')
           ->with([
                   'citizencharter'=>$citizencharter
               ]
           );
   }

}
