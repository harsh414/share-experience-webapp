<?php

namespace App\Http\Livewire;

use App\Models\Experience;
use Livewire\Component;

class FeedExperiences extends Component
{
    public $experiences;
    public function render() {
        return view('livewire.feed-experiences');
    }

}
