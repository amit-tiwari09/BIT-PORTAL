
@extends('backend.StudentDashboard.index')

@section('showreview')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testimonials</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="section-heading text-highlight"><span class="line">Testimonials</span></h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Check if the authenticated user has a testimonial -->
        @if($userTestimonial)
            <!-- Display the authenticated user's testimonial -->
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img class="card-img-top" src="{{ asset('pictures/' . $userTestimonial->image) }}" alt="{{ $userTestimonial->name }}">
                        <div class="card-body">
                            <blockquote class="quote">
                                <p><i class="fas fa-quote-left"></i>{{ $userTestimonial->content }}</p>
                            </blockquote>
                            <div class="source">
                                <p class="people">
                                    <span class="name">{{ $userTestimonial->name }}</span><br />
                                </p>
                            </div>

                            <!-- Edit and Delete buttons -->
                            <div class="mt-3">
                                <a href="{{ route('testimonials.edit', $userTestimonial->id) }}" class="btn btn-warning">Edit</a>

                                <!-- Form for deleting testimonial -->
                                <form action="{{ route('testimonials.destroy', $userTestimonial->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete your testimonial?')">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <!-- If the user has no testimonial, display the "Add Review" button -->
            <div class="alert alert-info">
                You haven't added a testimonial yet. Please add your review.
            </div>
            <a href="{{ route('testimonials.create') }}" class="btn btn-primary">Add Review</a>
        @endif
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
@endsection