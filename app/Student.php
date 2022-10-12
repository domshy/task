<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class Student extends Model
{
    protected $table = 'students';
    public $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'role',
        'fullname',
        'birth_place',
        'gender',
        'dob',
        'age',
        'contact',
        'email',
        'address',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(('App\User'));
    }

    public function getStudents()
    {
        $records = DB::table('students')->select(

            'role',
            'fullname',
            'birth_place',
            'gender',
            'dob',
            'age',
            'contact',
            'email',
            'address',
            'user_id'
        )->get()->toArray();
        return $records;
    }
}
