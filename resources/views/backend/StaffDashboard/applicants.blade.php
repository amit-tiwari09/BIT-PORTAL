@extends('backend.StaffDashboard.index')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Applicants</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #eef2f3; /* Light gray background */
        }

        .applicant-card {
            background-color: #ffffff; /* White background for cards */
            padding: 20px;
            margin: 20px 0;
            border: 1px solid #d1d1d1; /* Light gray border */
            border-radius: 10px; /* Rounded corners */
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1); /* Subtle shadow */
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .applicant-card:hover {
            transform: translateY(-5px); /* Lift effect */
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2); /* Enhanced shadow on hover */
        }

        .applicant-card p {
            margin-bottom: 10px;
        }

        .applicant-button {
            background-color: #007bff; /* Bootstrap primary color */
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .applicant-button:hover {
            background-color: #0056b3; /* Darker blue on hover */
        }

        @media (max-width: 768px) {
            .applicant-card {
                margin: 10px;
            }
        }
    </style>
</head>

<body>
    @section('applicants')

    <div class="container mt-5">
        <h1 class="text-center mb-4">Applicants List</h1>

        @if($applicants->isNotEmpty())
            @foreach($applicants as $applicant)
                <div class="applicant-card">
                    <p><strong>Name:</strong> {{ $applicant->name }}</p>
                    <p><strong>Email:</strong> {{ $applicant->email }}</p>
                    <!-- Add more fields as needed -->
                    <button class="applicant-button" onclick="window.location='{{ route('admin.view', $applicant->id) }}'">View</button>
                </div>
            @endforeach
        @else
            <div class="alert alert-warning text-center">
                No applicants found.
            </div>
        @endif
    </div>

    @endsection

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>