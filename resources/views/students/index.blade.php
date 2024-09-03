<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<br>

<a  href="{{ route('students.create')}}" class="btn btn-primary">Create New</a>
<br>
<body>
   <table border=1 class='table'>
    <thead>
<tr>
    <th>S.N</th>
    <th>Name</th>
    <th>Email</th>
    <th>Action</th>
</tr>
</thead>
<tbody>


@foreach($students as $student)

<tr>
    <td>{{ $loop->iteration}}</td>
    <td>{{$student->name }}</td>
    <td>{{ $student->email}}</td>
    <td><a  href="{{ route('students.edit', $student->id)}}" class="btn btn-secondary">Edit</a> | <a  href="{{ route('students.delete',$student->id)}}" class="btn btn-danger">Delete</a></td>
</tr>
@endforeach
</tbody>
</table>
</body>
</html>