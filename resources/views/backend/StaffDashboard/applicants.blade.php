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
            background-color: #eef2f3;
        }

        .applicant-card {
            background-color: #ffffff;
            padding: 20px;
            margin: 20px 0;
            border: 1px solid #d1d1d1;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .applicant-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
        }

        .applicant-card p {
            margin-bottom: 10px;
        }

        .applicant-button {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .applicant-button:hover {
            background-color: #0056b3;
        }

        .delete-button {
            background-color: #dc3545;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-left: 10px;
        }

        .delete-button:hover {
            background-color: #c82333;
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
                    <button class="delete-button" onclick="confirmDeletion({{ $applicant->id }})">Delete</button>
                </div>
            @endforeach
        @else
            <div class="alert alert-warning text-center">
                No applicants found.
            </div>
        @endif
    </div>

    @endsection

    <form id="delete-form" method="POST" style="display: none;">
        @csrf
        @method('DELETE')
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function confirmDeletion(applicantId) {
            if (confirm('Are you sure you want to delete this applicant?')) {
                const form = document.getElementById('delete-form');
                form.action = `applicants/${applicantId}`;
                form.submit();
            }
        }
    </script>
</body>

</html>
