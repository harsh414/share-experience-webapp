<?php

namespace App\Models;

use App\Traits\ExperienceTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function experiences() {
        return $this->hasMany(Experience::class);
    }

    public function ifSharedForThisQuestion(Question $question) {
        return !!$question->experiences()->where('user_id',auth()->user()->id)
            ->count();
    }

}
