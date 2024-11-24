<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container">
    <h1 class="text-center">Your Testimonial</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($testimonial)
        <div class="testimonial">
            <blockquote class="quote">
                <p>{{ $testimonial->content }}</p>
            </blockquote>
            @if ($testimonial->image)
                <div class="text-center">
                    <img src="{{ asset('storage/' . $testimonial->image) }}" alt="Profile Image" class="img-thumbnail" style="width: 150px;">
                </div>
            @endif
            <div class="text-center mt-3">
                <a href="{{ route('testimonials.edit') }}" class="btn btn-primary">Edit Testimonial</a>
            </div>
        </div>
    @else
        <div class="text-center">
            <p>You have not added a testimonial yet.</p>
            <a href="{{ route('testimonials.create') }}" class="btn btn-primary">Add Testimonial</a>
        </div>
    @endif
</div>
</body>
</html>