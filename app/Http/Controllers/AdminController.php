<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Student;
use App\User;
use Illuminate\Http\Request;


class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $students = Student::where('user_id', auth()->user()->id)->orderBy('student_no', 'asc')->get();
        return view('dashboard', compact('students'));
    }
    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'role' => 'student',
            'fullname' => ['required', 'string', 'min:3', 'max:255'],
            'birth_place' => ['required', 'string'],
            'gender' => 'required',
            'dob' => 'date_format:Y-m-d|before:today|nullable',
            'contact' => ['required', 'regex:/^(09)\\d{9}$/'],
            'email' => ['required', 'regex:/.+@(gmail|yahoo)\.com$/', 'unique:students'],
            // 'password' => ['required', 'min:8', 'confirmed'],
            'address' => ['required', 'max:255', 'min:10']
        ]);

        $student_no = Helper::IDGenerator(new Student,  'student_no', 7, 'STDNT');

        $student = new Student;
        $student->role = "student";
        $student->fullname = $request->input('fullname');
        $student->birth_place = $request->input('birth_place');
        $student->gender = $request->input('gender');
        $student->dob = $request->input('dob');
        $student->contact = $request->input('contact');
        $student->email = $request->input('email');
        // $student->password = Hash::make($request['password']);
        $student->address = $request->input('address');
        $student->user_id = auth()->user()->id;
        $student->student_no = $student_no;
        $student->save();

        return redirect('/dashboard')->with('success', 'User Added');
    }
    public function show($id)
    {
        $student = Student::find($id);
        return view('admin.dashboard')->with('student', $student);
    }
    public function edit($id)
    {
        $student = Student::find($id);

        return view('admin.edit')->with('student', $student);
    }
    public function update(Request $request, $id)
    {

        try {
            $this->validate($request, [
                'fullname' => ['required', 'string', 'min:3', 'max:255'],
                'birth_place' => ['required', 'string'],
                'gender' => ['required'],
                'dob' => ['date_format:Y-m-d', 'before:today', 'nullable'],
                'contact' => ['required', 'regex:/^(09)\\d{9}$/'],
                'email' => ['required', 'regex:/.+@(gmail|yahoo)\.com$/', 'unique:students'],
                // 'password' => ['required', 'min:8', 'confirmed'],
                'address' => ['required', 'max:255']
            ]);

            $student = Student::find($id);
            $student->role = "student";
            $student->fullname = $request->input('fullname');
            $student->birth_place = $request->input('birth_place');
            $student->gender = $request->input('gender');
            $student->dob = $request->input('dob');
            $student->contact = $request->input('contact');
            $student->email = $request->input('email');
            // $student->password = Hash::make($request['password']);,
            $student->address = $request->input('address');
            $student->save();


            return redirect('/dashboard')->with('success', 'User Details Updated!');
        } catch (\Exception $e) {
            return redirect('/student/edit/' . $id)->with('errors', $e->errors());
        }
    }
    public function destroy($id)
    {
        $student = Student::find($id);
        $student->delete();
        return redirect('/dashboard')->with('success', 'User Deleted!');
    }
}
