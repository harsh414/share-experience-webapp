<?php

namespace App\Http\Livewire;


use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class LikeUpdate extends Component
{
    use AuthorizesRequests;
    public $experience;
    public $toLike;
    public function render()
    {
        return view('livewire.like-update');
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
