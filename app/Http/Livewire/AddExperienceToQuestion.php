<?php

namespace App\Http\Livewire;

use App\Models\Experience;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AddExperienceToQuestion extends Component
{
    public $question;
    public $company_name;
    public $title;
    public $experience;
    protected $rules = [
        'company_name' => 'required',
        'title' => 'required|min:5',
        'experience' => 'required|min:30',
    ];
    public function render() {
        return view('livewire.add-experience-to-question');
    }

    public function addExperienceToQuestion() {
        $this->validate();
        $exp= new Experience();
        $exp->category = $this->question->category;
        $exp->company_name= $this->company_name;
        $exp->title= $this->title;
        $exp->description= $this->experience;
        $exp->user_id= Auth::id();
        $exp->was_asked= true;
        $exp->question_id= $this->question->id;
        $exp->save();
        $this->question->experiences->push($exp);
        $this->company_name="";
        $this->title="";
        $this->experience="";
    }
}
