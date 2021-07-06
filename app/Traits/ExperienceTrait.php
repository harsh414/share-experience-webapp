<?php

namespace App\Traits;

use App\Models\Experience;

trait ExperienceTrait {
    public function myExperiences() { //all user-experiences
        return view('my-experiences');
    }

    public function show($id) { //show an experience
        $experience= Experience::findOrFail($id);
        return view('experience-details',[
            'experience'=>$experience
        ]);
    }

    public function deleteExperience($id) { //deleting an experience
        $to_delete = Experience::find($id);
        if($to_delete){
            $destroy= Experience::destroy($id);
            return back()->with('removal_success','Removed Successfully');
        }
    }
}
