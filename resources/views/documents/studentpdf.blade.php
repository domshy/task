<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <style>
        .emp {
            border-collapse: collapse;
            margin: 25px;
            font-size: 0.9em;
            widows: 40vw;
            font-family: sans-serif;
            /* min-width: 400px; */
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        }

        .emp thead tr {
            background-color: #009879;
            color: #ffffff;
            text-align: left;
        }

        .emp th,
        .emp td {
            padding: 15px;
        }

        .emp th,
        .emp tr {
            padding: 12px 15px;
        }

        .emp tbody tr {
            border-bottom: 1px solid #dddddd;
        }

        .emp tbody tr:nth-of-type(even) {
            background-color: lightblue;
        }

        .emp tbody tr:last-of-type {
            border-bottom: 2px solid #009879;
        }

        .styled-table tbody tr.active-row {
            font-weight: bold;
            color: #009879;
        }
    </style>
</head>

<body>
    <h1>Students' Details</h1>
    <table class="emp">
        <thead>
            <tr>
                <th>Name</th>
                <th>Gender</th>
                <th>Birthday</th>
                <th>Address</th>
                <th>Contact</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr>
                    <td>{{ $student->fullname }}</td>
                    <td>{{ $student->gender }}</td>
                    <td>{{ $student->dob }}</td>
                    <td>{{ $student->address }}</td>
                    <td>{{ $student->contact }}</td>
                    <td>{{ $student->email }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
