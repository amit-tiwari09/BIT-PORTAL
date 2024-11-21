
@extends('backend.StaffDashboard.index')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Lightbox2 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .container {
            margin-top: 50px;
            max-width: 800px;
        }

        .profile-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .profile-image {
            max-width: 200px;
            border: 5px solid #007bff;
            transition: transform 0.2s;
        }

        .profile-image:hover {
            transform: scale(1.05);
        }

        .form-group label {
            font-weight: bold;
        }

        .btn-primary {
            margin-top: 20px;
        }

        .card {
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #ffffff;
        }

        .img-thumbnail {
            cursor: pointer;
        }
    </style>
</head>

<body>

@section('showprofilestaff')
    <div class="container">
        <h1 class="profile-header">Profile Details</h1>

        <!-- Display Success Message -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card">
            <div class="row">
                <div class="col-md-4 text-center">
                    <!-- Lightbox2 Integration: wrap the image with an anchor tag -->
                    <a href="{{ asset('pictures/' . $staff->image) }}" data-lightbox="profile" data-title="{{ $staff->name }}">
                        <img src="{{ asset('pictures/' . $staff->image) }}" alt="Staff Image" class="img-fluid rounded-circle profile-image" />
                    </a>
                </div>

                <div class="col-md-8">
                    <!-- Display Staff Details -->
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <p>{{ $staff->name }}</p>
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <p>{{ $staff->email }}</p>
                    </div>

                    <div class="form-group">
                        <label for="phone_no">Phone Number:</label>
                        <p>{{ $staff->phone_no }}</p>
                    </div>

                    <div class="form-group">
                        <label for="address">Address:</label>
                        <p>{{ $staff->address }}</p>
                    </div>

                    <div class="form-group">
                        <label for="dob">Date of Birth:</label>
                        <p>{{ $staff->dob }}</p>
                    </div>

                    <div class="form-group">
                        <label for="gender">Gender:</label>
                        <p>{{ ucfirst($staff->gender) }}</p>
                    </div>

                    <!-- Edit Profile Button -->
                    <div class="form-group">
                        <a href="{{ route('staff.edit', $staff->id) }}" class="btn btn-primary">
                            <i class="fas fa-edit"></i> Edit Profile
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection 

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
</body>

</html>