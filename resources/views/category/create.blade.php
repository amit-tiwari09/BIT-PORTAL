

@extends('backend.StaffDashboard.index')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Category</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa; /* Light background */
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
            color: #343a40; /* Darker text color */
        }

        .form-group label {
            font-weight: bold; /* Bold labels */
        }

        .btn-primary {
            width: 100%; /* Full-width button */
        }

        @media (max-width: 576px) {
            .container {
                padding: 20px; /* Reduce padding on small screens */
            }
        }
    </style>
</head>
@section('galleryCategory')
<body>
    <div class="container">
        <h1>Create Category</h1>

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