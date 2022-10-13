<?php

namespace App\Imports;

use App\Student;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Helpers\Helper;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $student = new Student;
        $stdnt = Helper::IDGenerator($student, 'student_no', 6, date('Y'));

        return [
            new Student([
                'role' => 'student',
                'fullname' => $row['fullname'],
                'birth_place' => $row['birth_place'],
                'gender' => $row['gender'],
                'dob' => $row['dob'],
                'contact' => $row['contact'],
                'email' => $row['email'],
                'address' => $row['address'],
                'user_id' => Auth::user()->id,
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
            '*.email' => ['email', 'unique:students,email'],
        ];
    }
}
