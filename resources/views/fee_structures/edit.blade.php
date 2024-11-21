@extends('backend.StaffDashboard.index')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Fee Structure</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOMl0bP3F7j6z5T4Q6+G7/8g6t5j4v9Q0K1T7y" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/c9cb99f12f.js" crossorigin="anonymous"></script>
    <style>
        body {
            background-color: #f8f9fa; /* Light background */
        }

        .container {
            margin-top: 30px;
            border-radius: 8px;
            background-color: white;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
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
                padding: 15px; /* Reduce padding on small screens */
            }
        }
    </style>
</head>

<body>

@section('feeedit')
    <div class="container">
    <a href="{{ route('fee_structures.index') }}" class="back-button">
        <i class="fas fa-arrow-left"></i> Back
     </a>
        <h1>Edit Fee Structure</h1>

        <form action="{{ route('fee_structures.update', $feeStructure->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="department">Department</label>
                <input type="text" name="department" id="department" class="form-control" value="{{ old('department', $feeStructure->department) }}" required>
            </div>

            <div class="form-group">
                <label for="semester1_fee">Semester 1 Fee</label>
                <input type="number" name="semester1_fee" id="semester1_fee" class="form-control" value="{{ old('semester1_fee', $feeStructure->semester1_fee) }}" required>
            </div>

            <div class="form-group">
                <label for="semester2_fee">Semester 2 Fee</label>
                <input type="number" name="semester2_fee" id="semester2_fee" class="form-control" value="{{ old('semester2_fee', $feeStructure->semester2_fee) }}" required>
            </div>

            <div class="form-group">
                <label for="semester3_fee">Semester 3 Fee</label>
                <input type="number" name="semester3_fee" id="semester3_fee" class="form-control" value="{{ old('semester3_fee', $feeStructure->semester3_fee) }}" required>
            </div>

            <div class="form-group">
                <label for="semester4_fee">Semester 4 Fee</label>
                <input type="number" name="semester4_fee" id="semester4_fee" class="form-control" value="{{ old('semester4_fee', $feeStructure->semester4_fee) }}" required>
            </div>

            <div class="form-group">
                <label for="semester5_fee">Semester 5 Fee</label>
                <input type="number" name="semester5_fee" id="semester5_fee" class="form-control" value="{{ old('semester5_fee', $feeStructure->semester5_fee) }}" required>
            </div>

            <div class="form-group">
                <label for="semester6_fee">Semester 6 Fee</label>
                <input type="number" name="semester6_fee" id="semester6_fee" class="form-control" value="{{ old('semester6_fee', $feeStructure->semester6_fee) }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update Fee Structure</button>
        </form>
    </div>
@endsection

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>