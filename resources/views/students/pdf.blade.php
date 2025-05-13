<!DOCTYPE html>
<html>
<head>
    <title>Student List</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid black; padding: 4px; text-align: left; }
    </style>
</head>
<body>
    <h2>Student List</h2>
    <table>
        <thead>
            <tr>
                <th>Student ID</th><th>Name</th><th>Email</th><th>Address</th><th>Contact No.</th><th>Gender</th><th>Birthdate</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
            <tr>
                <td>{{ $student->student_id }}</td>
                <td>{{ $student->lastname }} {{ $student->firstname }}</td>
                <td>{{ $student->email }}</td>
		<td>{{ $student->address }}</td>
		<td>{{ $student->contact_number }}</td>
                <td>{{ $student->gender }}</td>
                <td>{{ $student->birthdate }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
