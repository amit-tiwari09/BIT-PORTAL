<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Applicants</title>
</head>
<body>
    @if($applicants)
@foreach($applicants as $applicant)
    <div class="applicant">
        <p>Name: {{ $applicant->name }}</p>
        <p>Email: {{ $applicant->email }}</p>
        <!-- Add more fields as needed -->
        <button onclick="window.location='{{ route('admin.view', $applicant->id) }}'">View</button>
        <form action="{{ route('admin.approve', $applicant->id) }}" method="POST">
            @csrf
            <button type="submit">Approve</button>
        </form>
    </div>
@endforeach
@endif
</body>
</html>