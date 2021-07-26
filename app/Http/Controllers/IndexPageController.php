<?php

namespace App\Http\Controllers;
use App\Models\Experience;
use App\Models\Like;
use App\Models\Question;
use App\Traits\ExperienceTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class IndexPageController extends Controller
{
    //*********ALL SHARES ****************
    use ExperienceTrait; //contains fns for show delete experiences
    public function index() {
        $experiences= Experience::orderBy('created_at','DESC')->get();
        return view('index',[
            'experiences'=>$experiences,
            'choosen'=>NULL
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
            'choosen'=>$category
        ]);
    }
    // ***************ALL SHARES ENDS ********************

    //**************QUESTIONS PART************************
    public function recentlyAsked() {
        $questions = Question::orderBy('created_at','DESC')->get();
        return view('recently-asked',[
            'questions'=>$questions,
        ]);
    }

    public function showQuestion($id) {
        $question= Question::findOrFail($id);
        return view('question-description',[
            'question'=>$question,
        ]);
    }

    public function removeQuestion($id){
        $question= Question::findOrFail($id);
        if($question){
            Question::destroy($id);
            return back()->with('removal_success_question','Question withdrawed');
        }else{
            return back()->with('removal_success_question','Try later');
        }
    }
    //**********QUESTION PART ENDS **********

    // ********MY INVOLVEMENTS BEGINS********
    public function initialResults(){
        $returned= Question::where('user_id', '=', auth()->user()->id)->orderBy('created_at', 'DESC')->get();
        return view('my-involvements',[
            'returned'=>$returned,
            'choosen'=>NULL,
        ]);
    }
    public function myInvolvements(Request $request) { //getting post req to change dropdown
        $category = ($request->input('category'));
        $choosen= $category;
        $returned=NULL;
        if($category == 'Your-asked-questions') {
            $returned = Question::where('user_id', '=', auth()->user()->id)->get();
        }else if($category == 'Your-likes'){
            $user_id= Auth::id();
            $q= Like::where(['user_id'=>$user_id,'isliked'=>true])->get()->toArray();
            $exp_array=[];
            foreach ($q as $like){
                array_push($exp_array,$like['experience_id']);
            }
            $returned= Experience::whereIn('id',$exp_array)->get();
        }
        return view('my-involvements',[
            'returned'=>$returned,
            'choosen'=>$choosen
        ]);
    }
    // ******MY INVOLVEMENTS ENDS*********

    //**********Profile BEGINS******************
    public function myProfile() {
        return view('profile');
    }

    public function updateProfile(Request $request){
        $user= auth()->user();
        $skills= $request->input('skill');
        if($request->hasFile('file')) {
            $image = $request->file('file');
            $path = $image->store('profileimages', 's3');
            $url = Storage::disk('s3')->url($path);
            $user->img_url = $url;
        }else{
            $url= $user->img_url;
        }
        $user->skills= $skills;
        if($user->update()){
            $data= array(
                'skills'=>$skills,
                'msg'=>'Profile Updated Successfully',
            );
            return $data;
        }else{
            $data= array(
                'skills'=>$skills,
                'msg'=>'Failed to update profile',
                'image_url'=>$url,
            );
        }
    }
    //******PROFILE ENDS********


}
