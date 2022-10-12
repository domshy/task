<?php

namespace App\Http\Controllers;

use App\Student;
use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = array();
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $total = Student::all()->count();

        $data = [
            'students' => $user->students,
            'total' => $total
        ];
        return view('dashboard', $data);
    }
}
