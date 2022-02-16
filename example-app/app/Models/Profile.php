<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
        'country',
    ];
    protected $table = "profile";
}
