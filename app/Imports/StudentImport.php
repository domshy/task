<?php

namespace App\Imports;

use App\Student;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Helpers\Helper;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Validators\Failure;
use Throwable;

class StudentImport implements ToModel, WithHeadingRow, SkipsOnError, WithValidation, SkipsOnFailure
{
    use Importable, SkipsErrors, SkipsFailures;
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $student = new Student;
        $stdnt = Helper::IDGenerator($student, 'student_no', 6, Student::PREFIX);

        // dd($stdnt);
        return [
            new Student([
                'role' => 'student',
                'fname' => $row['fname'],
                'middlename' => $row['middlename'],
                'lname' => $row['lname'],
                'birth_place' => $row['birth_place'],
                'gender' => $row['gender'],
                'dob' => $row['dob'],
                'age'=> $row['age'],
                'contact' => $row['contact'],
                'email' => $row['email'],
                'address' => $row['address'],
                'user_id' => Auth::user()->id,
                'password' => bcrypt($stdnt.$row['lname']),
                'student_no' => $stdnt
            ]),
            // Student::create([
            //     'role' => 'student',
            //     'fullname' => $row['fullname'],
            //     'birth_place' => $row['birth_place'],
            //     'gender' => $row['gender'],
            //     'dob' => $row['dob'],
            //     'contact' => $row['contact'],
            //     'email' => $row['email'],
            //     'address' => $row['address'],
            //     'user_id' => Auth::user()->id,
            //     'student_no' => $stdnt
            // ])
        ];
    }

    function rules(): array
    {
        return [
            '*.email' => ['email', 'unique:students,email', 'regex:/.+@(gmail|yahoo)\.com$/'],
        ];
    }
}
