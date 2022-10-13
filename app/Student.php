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
    const PREFIX = "2022A";

    protected $fillable = [
        'role',
        'fullname',
        'birth_place',
        'gender',
        'dob',
        'contact',
        'email',
        'address',
        'user_id',
        'student_no'
    ];

    public function user()
    {
        return $this->belongsTo(('App\User'));
    }

    public function getStudents()
    {
        $records = DB::table('students')->select(

            'role',
            'student_no',
            'fullname',
            'birth_place',
            'gender',
            'dob',
            'contact',
            'email',
            'address',
            'user_id',
            'student_no'
        )->get()->toArray();
        return $records;
    }
}
