<!DOCTYPE html>
<html>
<head>
    <title>Instructor List</title>
    <style>
        body { 
            font-family: sans-serif; 
            font-size: 10px; /* Reduced font size */
            margin: 0;
            padding: 10px;
        }
        h2 { 
            font-size: 14px;
            margin-bottom: 10px;
            text-align: center;
        }
        table { 
            width: 100%; 
            border-collapse: collapse; 
            margin-top: 5px;
            table-layout: fixed; /* Ensures columns respect width */
        }
        th, td { 
            border: 1px solid black; 
            padding: 3px; /* Reduced padding */
            text-align: left;
            word-wrap: break-word; /* Allows text to wrap */
        }
        /* Set specific widths for columns to prevent overflow */
        th:nth-child(1), td:nth-child(1) { width: 8%; } /* Instructor ID */
        th:nth-child(2), td:nth-child(2) { width: 10%; } /* Last Name */
        th:nth-child(3), td:nth-child(3) { width: 10%; } /* First Name */
        th:nth-child(4), td:nth-child(4) { width: 12%; } /* Department */
        th:nth-child(5), td:nth-child(5) { width: 15%; } /* Email */
        th:nth-child(6), td:nth-child(6) { width: 15%; } /* Address */
        th:nth-child(7), td:nth-child(7) { width: 10%; } /* Contact No. */
        th:nth-child(8), td:nth-child(8) { width: 8%; } /* Gender */
        th:nth-child(9), td:nth-child(9) { width: 12%; } /* Birthdate */
    </style>
</head>
<body>
    <h2>Instructor List</h2>
    <table>
        <thead>
            <tr>
                <th>Instructor ID</th>
                <th>Last Name</th>
                <th>First Name</th>
                <th>Department</th>
                <th>Email</th>
                <th>Address</th>
                <th>Contact No.</th>
                <th>Gender</th>
                <th>Birthdate</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($instructors as $instructor)
            <tr>
                <td>{{ $instructor->instructor_id }}</td>
                <td>{{ $instructor->lastname }}</td>
                <td>{{ $instructor->firstname }}</td>
                <td>{{ $instructor->department }}</td>
                <td>{{ $instructor->email }}</td>
                <td>{{ $instructor->address }}</td>
                <td>{{ $instructor->contact_number }}</td>
                <td>{{ $instructor->gender }}</td>
                <td>{{ date('m/d/Y', strtotime($instructor->birthdate)) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>