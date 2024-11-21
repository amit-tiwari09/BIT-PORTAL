@extends('backend.StudentDashboard.index');

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
<body>
    @section('profiledit')

    <div class="container">
    <div class="form-group">
    <a href="{{ route('StudentDashboard') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Back
    </a>
</div>
        <div class="card">
            <h2 class="text-center mb-4">Edit Profile</h2>
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="name"><i class="fas fa-user"></i> Name</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $student->name) }}" required>
                </div>

                <div class="form-group">
                    <label for="email"><i class="fas fa-envelope"></i> Email</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email', $student->email) }}" required>
                </div>

                <div class="form-group">
                    <label for="password"><i class="fas fa-lock"></i> Password</label>
                    <input type="password" name="password" class="form-control">
                    <small class="form-text text-muted">Leave blank if you don't want to change it.</small>
                </div>

                <div class="form-group">
                    <label for="password_confirmation"><i class="fas fa-lock"></i> Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control">
                </div>

                <div class="form-group">
                    <label for="phone_no"><i class="fas fa-phone"></i> Phone Number</label>
                    <input type="text" name="phone_no" class="form-control" value="{{ old('phone_no', $student->phone_no) }}" required>
                </div>

                <div class="form-group">
                    <label for="address"><i class="fas fa-home"></i> Address</label>
                    <textarea name="address" class="form-control" required>{{ old('address', $student->address) }}</textarea>
                </div>

                <div class="form-group">
                    <label for="dob"><i class="fas fa-calendar-alt"></i> Date of Birth</label>
                    <input type="date" name="dob" class="form-control" value="{{ old('dob', $student->dob) }}" required>
                </div>

                <div class="form-group">
                    <label for="gender"><i class="fas fa-venus-mars"></i> Gender</label>
                    <select name="gender" class="form-control" required>
                        <option value="male" {{ old('gender', $student->gender) == 'male' ? 'selected' : '' }}>Male</option>
                        <option value="female" {{ old('gender', $student->gender) == 'female' ? 'selected' : '' }}>Female</option>
                        <option value="other" {{ old('gender', $student->gender) == 'other' ? 'selected' : '' }}>Other</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="image"><i class="fas fa-image"></i> Profile Picture</label>
                    <input type="file" name="image" class="form-control-file">
                    @if ($student->image)
                        <img src="{{ asset('pictures/' . $student->image) }}" alt="Profile Picture" class="img-thumbnail mt-2" width="150">
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