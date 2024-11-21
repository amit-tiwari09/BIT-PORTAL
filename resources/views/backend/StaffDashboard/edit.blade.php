@extends('backend.StaffDashboard.index')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .container {
            margin-top: 50px;
            max-width: 600px;
        }

        .card {
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .form-group label {
            font-weight: bold;
        }

        .btn-primary {
            width: 100%;
        }

        .img-thumbnail {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
@section('staffedit')
<body>
    <div class="container">
        <div class="card">
            <div class="form-group">
                <a href="{{ route('staff.show') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Back
                </a>
            </div>
            <h2 class="text-center mb-4">Edit Profile</h2>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('staff.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name"><i class="fas fa-user"></i> Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $staff->name) }}" required>
                </div>
                <div class="form-group">
                    <label for="email"><i class="fas fa-envelope"></i> Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $staff->email) }}" required>
                </div>
                <div class="form-group">
                    <label for="phone_no"><i class="fas fa-phone"></i> Phone Number</label>
                    <input type="text" class="form-control" id="phone_no" name="phone_no" value="{{ old('phone_no', $staff->phone_no) }}" required>
                </div>
                <div class="form-group">
                    <label for="address"><i class="fas fa-home"></i> Address</label>
                    <textarea class="form-control" id="address" name="address" rows="3" required>{{ old('address', $staff->address) }}</textarea>
                </div>
                <div class="form-group">
                    <label for="dob"><i class="fas fa-calendar-alt"></i> Date of Birth</label>
                    <input type="date" class="form-control" id="dob" name="dob" value="{{ old('dob', $staff->dob) }}" required>
                </div>
                <div class="form-group">
                    <label for="gender"><i class="fas fa-venus-mars"></i> Gender</label>
                    <select class="form-control" id="gender" name="gender" required>
                        <option value="male" {{ old('gender', $staff->gender) == 'male' ? 'selected' : '' }}>Male</option>
                        <option value="female" {{ old('gender', $staff->gender) == 'female' ? 'selected' : '' }}>Female</option>
                        <option value="other" {{ old('gender', $staff->gender) == 'other' ? 'selected' : '' }}>Other</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="image"><i class="fas fa-image"></i> Profile Image</label>
                    <input type="file" class="form-control-file" id="image" name="image">
                    @if ($staff->image)
                        <img src="{{ asset('pictures/' . $staff->image) }}" style="height: 40vh;" alt="Profile Image" class="img-thumbnail mt-2">
 @endif
                </div>
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Update Profile</button>
            </form>
        </div>
    </div>

    @endsection
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>