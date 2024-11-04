@extends('backend.StaffDashboard.index')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fee Structures</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa; /* Light background */
        }

        .container {
            margin-top: 20px;
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

        .btn-primary {
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            margin-top: 10px;
        }

        th {
            background-color: #007bff; /* Bootstrap primary color */
            color: white;
        }

        td {
            vertical-align: middle; /* Center align text vertically */
        }

        @media (max-width: 768px) {
            .table-responsive {
                margin-bottom: 20px; /* Space below table */
            }
        }
    </style>
</head>

<body>
    @section('feestructure')
    <div class="container">
        <h1>Fee Structures</h1>

        @if ($feeStructureCount < 5 && Auth::guard('staff')->check() && Auth::guard('staff')->user()->role === 'principal')
            <a href="{{ route('fee_structures.create') }}" class="btn btn-primary">Create Fee Structure</a>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Department</th>
                        <th>Semester 1 Fee</th>
                        <th>Semester 2 Fee</th>
                        <th>Semester 3 Fee</th>
                        <th>Semester 4 Fee</th>
                        <th>Semester 5 Fee</th>
                        <th>Semester 6 Fee</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($feeStructures as $feeStructure)
                    <tr>
                        <td>{{ $feeStructure->department }}</td>
                        <td>{{ $feeStructure->semester1_fee }}</td>
                        <td>{{ $feeStructure->semester2_fee }}</td>
                        <td>{{ $feeStructure->semester3_fee }}</td>
                        <td>{{ $feeStructure->semester4_fee }}</td>
                        <td>{{ $feeStructure->semester5_fee }}</td>
                        <td>{{ $feeStructure->semester6_fee }}</td>
                        <td>
                            <a href="{{ route('fee_structures.edit', $feeStructure->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <!-- Add delete functionality as needed -->
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endsection

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>