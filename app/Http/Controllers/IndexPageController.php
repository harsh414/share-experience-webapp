<?php

namespace App\Http\Controllers;
use App\Models\Experience;
use Illuminate\Http\Request;

class IndexPageController extends Controller
{
    public function index() {
        $experiences= Experience::all();
        return view('index',[
            'experiences'=>$experiences
        ]);
    }

    public function show($id) {
        $experience= Experience::findOrFail($id);
        return view('experience-details',[
            'experience'=>$experience
        ]);
    }
}
