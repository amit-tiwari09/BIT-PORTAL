<!-- resources/views/testimonials/edit.blade.php -->
@extends('backend.StudentDashboard.index')
@section('editreview')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Testimonial</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Edit Your Testimonial</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form action="{{ route('testimonials.update', $testimonial->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="content">Testimonial Content</label>
                <textarea class="form-control" id="content" name="content" rows="4">{{ old('content', $testimonial->content) }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Update Testimonial</button>
        </form>

        <a href="{{ route('testimonials.show') }}" class="btn btn-secondary mt-3">Back to Testimonials</a>
    </div>
</body>
</html>

@endsection
