<?php

namespace App\Http\Controllers;
use App\Models\Experience;
use App\Models\Question;
use App\Traits\ExperienceTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexPageController extends Controller
{
    use ExperienceTrait; //contains fns for show delete experiences
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

}
