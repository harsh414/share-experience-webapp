<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inappropriate extends Model
{
    protected $table='inappropriate_experiences';
    protected $guarded= [];
    use HasFactory;
}
