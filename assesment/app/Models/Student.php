<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Auth\User as Authenticatable;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'password','date_of_joining'];

    protected $hidden = [
        'password',
    ];
}
