<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Student;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;


class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $students = Student::where('user_id', auth()->user()->id)->orderBy('student_no', 'asc')->get();
        return view('/dashboard', compact('students'));
    }
    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {

        try {
            $this->validate($request, [
                'role' => 'student',
                'fname' => ['required', 'string', 'min:3', 'max:255'],
                'middlename' => ['required', 'string', 'min:3', 'max:255'],
                'lname' => ['required', 'string', 'min:3', 'max:255'],
                'birth_place' => ['required', 'string'],
                'gender' => 'required',
                'dob' => 'date_format:Y-m-d|before:today|nullable',
                'contact' => ['required', 'regex:/^(09)\\d{9}$/'],
                'email' => ['required', 'regex:/.+@(gmail|yahoo)\.com$/', 'unique:students'],
                'address' => ['required', 'max:255', 'min:10']
            ]);

            $studentgenerate = Helper::IDGenerator(new Student,  'student_no', 7, '2022A');

            $student = new Student;

            $student->role = "student";
            $student->fname = $request->input('fname');
            $student->middlename = $request->input('middlename');
            $student->lname = $request->input('lname');
            $student->birth_place = $request->input('birth_place');
            $student->gender = $request->input('gender');
            $student->dob = $request->input('dob');
            $student->age = Carbon::parse($request->dob)->age;
            $student->contact = $request->input('contact');
            $student->email = $request->input('email');
            $student->password = Hash::make($studentgenerate . $request->lname);
            $student->address = $request->input('address');
            $student->user_id = auth()->user()->id;
            $student->student_no = $studentgenerate;
            $student->save();

            Alert()->success('Succes', 'Student Successfully Added!');
            return redirect('/admin/dashboard')->with('success', 'User Added');
        } catch (\Exception $e) {
            return redirect('admin/add-student')->with('errors', $e->errors());
        }
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
                'fname' => ['required', 'string', 'min:3', 'max:255'],
                'middlename' => ['required', 'string', 'min:3', 'max:255'],
                'lname' => ['required', 'string', 'min:3', 'max:255'],
                'birth_place' => ['required', 'string'],
                'gender' => 'required',
                'dob' => 'date_format:Y-m-d|before:today|nullable',
                'contact' => ['required', 'regex:/^(09)\\d{9}$/'],
                'email' => ['required', 'regex:/.+@(gmail|yahoo)\.com$/', 'unique:students'],
                'address' => ['required', 'max:255', 'min:10']
            ]);

            $student = Student::find($id);
            $student->role = "student";
            $student->fname = $request->input('fname');
            $student->middlename = $request->input('middlename');
            $student->lname = $request->input('lname');
            $student->birth_place = $request->input('birth_place');
            $student->gender = $request->input('gender');
            $student->dob = $request->input('dob');
            $student->contact = $request->input('contact');
            $student->email = $request->input('email');
            $student->age = Carbon::parse($request->dob)->age;
            $student->address = $request->input('address');
            $student->save();

            Alert()->success('Succes', 'Your data was saved!');

            return redirect('/dashboard')->with('success', 'User Details Updated!');
        } catch (\Exception $e) {
            return redirect('/admin/student/edit/' . $id)->with('errors', $e->errors());
        }
    }
    public function destroy($id)
    {
        try {
            $student = Student::find($id);
            $student->delete();
            Alert()->success('Success', 'Student Successfully Deleted!');
            return redirect('/admin/dashboard')->with('success', 'User Deleted!');
        } catch (\Exception $e) {
            return redirect('/admin/dashboard' . $id)->with('errors', $e->errors());
        }
    }
    public function viewprofile()
    {
        $admins = User::all();
        return view('admin.viewprofile')->with('admins', $admins);
    }
}
