<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class NewComment extends Component
{
    public $experience;
    public $comment_text="";
    public function render()
    {
        return view('livewire.new-comment');
    }

    public function addComment() {
        if($this->comment_text==''){
            return;
        }
        $new_comment= new Comment();
        $new_comment->experience_id= $this->experience->id;
        $new_comment->user_id= Auth::id();
        $new_comment->description = $this->comment_text;
        $new_comment->save();
        $this->experience->comments->push($new_comment);
        $this->comment_text="";
    }
}
