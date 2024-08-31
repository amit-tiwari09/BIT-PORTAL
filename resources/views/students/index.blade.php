<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students</title>
</head>
<body>
    <table border=1>
        <thead>
            <tr>
                <th>S.N.</th>
                <th>NAME</th>
                <th>EMAIL</th>

            </tr>
        </thead>
        <tbody>
           @foreach($students as $student)
           <tr>
                <td>{{ $loop->iteration}}</td>
                <td>{{ $student->name}}</td>
                <td>{{$student->email}}</td>
            </tr>
            @endforeach
         </tbody>
    </table>
</body>
</html>