<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function experiences() {
        return $this->hasMany(Experience::class);
    }

    public function likes() {
        return $this->hasMany(Like::class);
    }

    public function questions() {
        return $this->hasMany(Question::class);
    }

    public function InAppExperiences(){ //InApp means Inappropriate
        return $this->hasMany(Inappropriate::class);
    }

    public function ifMarkedAsInappropriate($experince_id) {
        return !! $this->InAppExperiences()
            ->where(['experience_id'=>$experince_id,'inappropriate'=>true])->count();
    }

}
