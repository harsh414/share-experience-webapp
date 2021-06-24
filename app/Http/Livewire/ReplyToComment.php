<?php

namespace App\Http\Livewire;

use App\Models\Reply;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ReplyToComment extends Component
{
    public $comment;
    public $reply_text="";
    public function render()
    {
        return view('livewire.reply-to-comment');
    }

    public function addReply() {
        $new_reply= new Reply();
        $new_reply->comment_id= $this->comment->id;
        $new_reply->user_id= Auth::id();
        $new_reply->description= $this->reply_text;
        $new_reply->save();
        $this->comment->push($new_reply);
        $this->reply_text="";
    }
}
