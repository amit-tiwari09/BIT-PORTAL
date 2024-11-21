@extends('backend.StaffDashboard.index')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Category</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOMl0bP3F7j6z5T4Q6+G7/8g6t5j4v9Q0K1T7y" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/c9cb99f12f.js" crossorigin="anonymous"></script>
    <style>
        body {
            background-color: #f8f9fa;
            /* Light background */
        }

        .container {
            margin-top: 50px;
            border-radius: 8px;
            background-color: white;
            padding: 30px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #343a40;
            /* Darker text color */
        }

        .form-group label {
            font-weight: bold;
            /* Bold labels */
        }

        .btn-primary {
            width: 100%;
            /* Full-width button */
        }

        @media (max-width: 576px) {
            .container {
                padding: 20px;
                /* Reduce padding on small screens */
            }
        }
    </style>
</head>
@section('galleryCategory')

<body>
    <div class="container">
        <h1>Create Category</h1>
        <a href="{{ route('gallery.index') }}" class="back-button">
            <i class="fas fa-arrow-left"></i> Back
        </a>

        <form action="{{ route('category.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Category Name:</label>
                <input type="text" name="name" class="form-control" required>
                @error('name')
                <div style="color: red;">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Create Category</button>
        </form>
    </div>
    @endsection

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>