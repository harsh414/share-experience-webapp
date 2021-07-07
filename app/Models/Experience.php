<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Experience extends Model
{
    use HasFactory;
    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function likes() {
        return $this->hasMany(Like::class);
    }

    public function create_like($user=null,$liked = true) {
        $this->likes()->updateOrCreate(
            [
            'user_id'=> $user ? $user->id : auth()->id,
            ],
            [
                'isliked'=>$liked
            ]
        );
    }

    public function num_likes($exp) {
        return $exp->likes()->where('isliked',true);
    }

    public function ifLikedBy(User $user,Experience $exp) {
        return !!$exp->likes()->where('user_id', $user->id)
            ->where('isliked', true)->count();
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function question() {
        return $this->belongsTo(Question::class);
    }
}
