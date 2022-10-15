<?php

namespace App\Exports;

use App\Student;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StudentExport implements FromCollection, WithHeadings
{

    public function headings(): array
    {
        return [
            'student_no',
            'fname',
            'middlename',
            'lname',
            'birth_place',
            'gender',
            'dob',
            'age',
            'contact',
            'email',
            'address',
            'user_id'
        ];
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Student::all(
            'student_no',
            'fname',
            'middlename',
            'lname',
            'birth_place',
            'gender',
            'dob',
            'age',
            'contact',
            'email',
            'address',
            'user_id'
        );
    }
}
