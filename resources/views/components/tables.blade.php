<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-body">
                <div class="box">
                    <div class="box-header">
                        {{-- <h3 class="box-title">Total of Student: {{ $total }}    --}}
                        </h3>
                        <br /><br />
                        <a href="/add-student" class="btn btn-primary">Add Student</a>
                        <a href="/download-pdf" class="btn btn-success">Download as PDF</a>
                        <a href="/export-csv" class="btn btn-danger">Download as CSV</a>
                        <a href="/export-excel" class="btn btn-warning">Download as EXCEL</a>
                    </div>

                    <div class="box-body">
                        @if (count($students) > 0)
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Student No</th>
                                        <th>Full Name</th>
                                        <th>Gender</th>
                                        <th>Place of Birth</th>
                                        <th>Birthday</th>
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
                                            <td>{{ $student->fullname }}</td>
                                            <td>{{ $student->gender }}</td>
                                            <td>{{ $student->birth_place }}</td>
                                            <td>{{ $student->dob }}</td>
                                            <td>{{ $student->contact }}</td>
                                            <td>{{ $student->address }}</td>
                                            <td>{{ $student->email }}</td>
                                            <td>
                                                <a href="/student/{{ $student->id }}/edit"
                                                    class="btn btn-default">Edit</a>
                                                {!! Form::open([
                                                    'action' => ['AdminController@destroy', $student->id],
                                                    'method' => 'POST',
                                                    'class' => 'pull-right',
                                                ]) !!}

                                                {{-- {{ Form::hidden('_method', 'DELETE') }} &nbsp; --}}
                                                {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}

                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <p>No student found</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>