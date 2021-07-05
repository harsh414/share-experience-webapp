<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DetailsPageLikeUpdate extends Component
{
    public $experience;
    public $toLike;
    public function render()
    {
        return view('livewire.details-page-like-update');
    }

    public function likeUpdate(){
        if ($this->experience->ifLikedBy(auth()->user(),$this->experience)){
            $this->toLike=false;
        }else{
            $this->toLike=true;
        }
        $this->experience->likes()->updateOrCreate(
            [
                'user_id'=> auth()->user()->id,
            ],
            [
                'isliked'=>$this->toLike
            ]
        );
    }
}
