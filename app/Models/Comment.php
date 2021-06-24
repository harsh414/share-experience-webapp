<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    public function experience() {
        return $this->belongsTo(Experience::class);
    }

    public function replies(){
        return $this->hasMany(Reply::class);
    }

    public function likes() {
        return $this->hasMany(Like::class);
    }

}
