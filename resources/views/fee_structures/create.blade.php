@extends('backend.StaffDashboard.index')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Fee Structure</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            /* Light background */
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
                padding: 15px;
                /* Reduce padding on small screens */
            }
        }
    </style>
</head>

<body>
    @section('feecreate')
    <div class="container">
        <h1>Create Fee Structure</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('fee_structures.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="department">Department</label>
                <select name="department" id="department" class="form-control" required>
                    <option value="" disabled selected>Select a department</option>
                    <option value="computer">Computer</option>
                    <option value="mechanical">Mechanical</option>
                    <option value="civil">Civil</option>
                    <option value="electrical">Electrical</option>
                    <option value="electronics">Electronics</option>
                </select>
            </div>

            <div class="form-group">
                <label for="semester1_fee">Semester 1 Fee</label>
                <input type="number" name="semester1_fee" id="semester1_fee" class="form-control" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="semester2_fee">Semester 2 Fee</label>
                <input type="number" name="semester2_fee" id="semester2_fee" class="form-control" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="semester3_fee">Semester 3 Fee</label>
                <input type="number" name="semester3_fee" id="semester3_fee" class="form-control" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="semester4_fee">Semester 4 Fee</label>
                <input type="number" name="semester4_fee" id="semester4_fee" class="form-control" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="semester5_fee">Semester 5 Fee</label>
                <input type="number" name="semester5_fee" id="semester5_fee" class="form-control" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="semester6_fee">Semester 6 Fee</label>
                <input type="number" name="semester6_fee" id="semester6_fee" class="form-control" step="0.01" required>
            </div>

            <button type="submit" class="btn btn-primary">Create Fee Structure</button>
        </form>
    </div>
    @endsection

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>