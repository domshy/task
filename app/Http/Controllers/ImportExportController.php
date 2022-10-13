<?php

namespace App\Http\Controllers;

use App\Exports\StudentExport;
use App\Imports\StudentImport;
use App\Student;
use App\User;
use PDF;
use Excel;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ImportExportController extends Controller
{
    public function viewPDF()
    {
        $student = Student::all();
        $pdf = PDF::loadView('documents.studentpdf', array('students' => $student))->setPaper('a4', 'landscape');
        return $pdf->stream();
    }
    public function downloadPDF()
    {
        $student = Student::all();
        $pdf = PDF::loadView('documents.studentpdf', array('students' => $student))->setPaper('a4', 'landscape');
        return $pdf->download();
    }
    public function exportToExcel()
    {
        return Excel::download(new StudentExport, 'students.xlsx');
    }
    public function exportIntoCSV()
    {
        return Excel::download(new StudentExport, 'students.csv');
    }

    public function show()
    {
        return view('components.tables');
    }

    public function store(Request $request)
    {
        $file = $request->file('file');

        Excel::import(new StudentImport, $file);

        return back()->withStatus('Excel File imported successfully!');
    }
}
