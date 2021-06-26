<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;

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
}
