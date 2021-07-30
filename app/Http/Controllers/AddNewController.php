<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AddNewController extends Controller
{
    public function storeExp(Request $request) {
        $request->validate([
            'company_name'=>'required',
            'title'=>'required| min:10',
            'experience'=>'required | min:30',
        ]);
        $ex =  new Experience();
        $ex->user_id= auth()->user()->id;
        $ex->title= $request->input('title');
        $ex->description= $request->input('experience');
        $ex->company_name=$request->input('company_name');
        $ex->category=$request->input('category_add');
        if($ex->save()){
            return back()->with('success','Thanks for sharing your experience');
        }
    }

    public function askQuestion(Request $request) {
        $questionError=NULL;
        if($request->input('company_name') == ''){
            $questionError= 'Company name is reqd..:(';
        }else if($request->input('question') == ''){
            $questionError = 'Question is required';
        }else if(strlen($request->input('question')) <30) {
            $questionError= 'Description is too short..:(';
        }
        if($questionError!=NULL){
            return redirect()->back()->with('qerror', $questionError);
        }

        $q =  new Question();
        $q->user_id= auth()->user()->id;
        $q->description= $request->input('question');
        $q->company_name=$request->input('company_name');
        $q->category=$request->input('category_add');
        if($q->save()){
            return back()->with('question_success','We posted your question !!🎉');
        }else{
            return back()->with('failure','fields error');
        }
    }

}
