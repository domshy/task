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
            'fullname',
            'birth_place',
            'gender',
            'dob',
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
            'fullname',
            'birth_place',
            'gender',
            'dob',

            'contact',
            'email',
            'address',
            'user_id'
        );
    }
}
