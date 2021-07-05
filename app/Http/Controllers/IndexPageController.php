<?php

namespace App\Http\Controllers;
use App\Models\Experience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexPageController extends Controller
{
    public function index() {
        $experiences= Experience::orderBy('created_at','DESC')->get();
        return view('index',[
            'experiences'=>$experiences
        ]);
    }

    public function changeCategory(Request $request) {
        $category = ($request->input('category'));
        if($category!='All-Experiences') {
            $experiences = Experience::where('category', '=', $category)->orderBy('created_at', 'DESC')->get();
        }else{
            $experiences= Experience::orderBy('created_at','DESC')->get();
        }
        return view('index',[
            'experiences'=>$experiences,
            'categoryChanged'=>$category
        ]);
    }

    public function show($id) {
        $experience= Experience::findOrFail($id);
        return view('experience-details',[
            'experience'=>$experience
        ]);
    }

    public function myExperiences() {
        return view('my-experiences');
    }

    public function deleteExperience($id) {
        $to_delete = Experience::find($id);
        if($to_delete){
//            $destroy= Experience::destroy($id);
            return back()->with('removal_success','Removed Successfully');
        }
    }

    public function recentlyAsked() {

    }
}
