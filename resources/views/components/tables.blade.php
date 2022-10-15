<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-body">
                <div class="box">

                    <div style="alert alert-success alert-dismissible fade show" role="alert">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                        @endif
                    </div>

                    <div style="alert alert-warning alert-dismissible fade show" role="alert">
                        @if (isset($errors) && $errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    {{ $error }}
                                @endforeach
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                        @endif
                        @if (session()->has('failures'))
                            <table class="table table-danger">
                                <tr>
                                    <th>Row</th>
                                    <th>Attribute</th>
                                    <th>Error/s</th>
                                    <th>Values</th>
                                </tr>

                                @foreach (session()->get('failures') as $validation)
                                    <tr>
                                        <td>{{ $validation->row() }}</td>
                                        <td>{{ $validation->attribute() }}</td>
                                        <td>
                                            <ul>
                                                @foreach ($validation->errors() as $e)
                                                    <li>{{ $e }}</li>
                                                @endforeach
                                            </ul>
                                        </td>
                                        <td>
                                            {{ $validation->values()[$validation->attribute()] }}
                                        </td>
                                    </tr>
                                @endforeach
                        @endif
                    </div>

                    <div class="box-header">
                        {{-- <h3 class="box-title">Total of Student: {{ $total }}    --}}
                        </h3>
                        <br /><br />
                        <a href="/admin/add-student" class="btn btn-primary">Add Student</a>
                        <a href="/admin/students/view-pdf" class="btn btn-success">View PDF</a>
                        <a href="/admin/students/download-pdf" class="btn btn-success">Download as PDF</a>
                        <a href="/admin/students/download-excel" class="btn btn-danger">Download as Excel</a>
                        <a href="/admin/students/download-csv" class="btn btn-warning">Download as CSV</a>
                    </div>


                    <div class="box-body">
                        <form action="/admin/students/import" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <br />
                                <label for="file">Import File</label>
                                <input type="file" name="file" class="form-control" style="width: 50%" />
                            </div>
                            <input type="submit" class="btn btn-success" />
                        </form>

                        @if (count($students) > 0)
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Student No</th>
                                        <th>Full Name</th>
                                        <th>Gender</th>
                                        <th>Place of Birth</th>
                                        <th>Birthday</th>
                                        <th>Age</th>
                                        <th>Contact</th>
                                        <th>Address</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($students as $student)
                                        <tr>
                                            <td>{{ $student->student_no }}</td>
                                            <td>{{ $student->fname . $student->middlename . $student->lname }}</td>
                                            <td>{{ $student->gender }}</td>
                                            <td>{{ $student->birth_place }}</td>
                                            <td>{{ $student->dob }}</td>
                                            <td>{{ $student->age }}</td>
                                            <td>{{ $student->contact }}</td>
                                            <td>{{ $student->address }}</td>
                                            <td>{{ $student->email }}</td>
                                            <td>
                                                <a href="/admin/student/edit/{{ $student->id }}"
                                                    class="btn btn-default">Edit</a>
                                                    
                                                    @include('sweetalert::alert')
                                                <form method="POST"
                                                    action="{{ action('AdminController@destroy', $student->id) }}">
                                                    @csrf
                                                    {{-- <input name="_method" type="hidden" value="DELETE"> --}}
                                                    <button type="submit"
                                                        class="btn btn-xs btn-danger btn-flat show-alert-delete-box btn-sm"
                                                        data-toggle="tooltip" title='Delete'>Delete</button>
                                                </form>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <p>No student's data yet</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
