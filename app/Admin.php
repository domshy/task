<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'admins';
    protected $fillable = [
        'admin_no',
        'fname',
        'middlename',
        'lname',
        'contact',
        'gender',
        'dob',
        'birth_place',
        'address',
        'age',
        'email',
    ];
}
