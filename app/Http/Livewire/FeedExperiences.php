<?php

namespace App\Http\Livewire;

use App\Models\Experience;
use Livewire\Component;

class FeedExperiences extends Component
{
    public $experiences;
    public $SelectedCategory;
    public function render() {
        return view('livewire.feed-experiences');
    }

    public function updatedSelectedCategory(){
        $this->experiences= Experience::where('category','=','Internship Experience')->get();
    }
}
