<!-- resources/views/testimonials/create.blade.php -->
@extends('backend.StudentDashboard.index')
@section('createreview')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Testimonial</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Add Testimonial</h1>

        <!-- Display success or error message -->
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @elseif(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <!-- Testimonial form -->
        <form method="POST" action="{{ route('testimonials.store') }}">
            @csrf
            <div class="form-group">
                <label for="content">Testimonial Content</label>
                <textarea id="content" name="content" class="form-control" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>

@endsection
