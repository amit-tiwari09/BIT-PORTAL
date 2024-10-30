@extends('backend.StaffDashboard.index')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Applicant Profile</title>
    <!-- Lightbox2 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" rel="stylesheet" />

    <!-- Lightbox2 JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9; /* Light gray background */
        }

        .applicant-profile {
            max-width: 800px; /* Adjust width as needed */
            margin: 40px auto; /* Center the profile */
            padding: 20px;
            background-color: #fff; /* White background */
            border: 1px solid #ddd; /* Light gray border */
            border-radius: 10px; /* Rounded corners */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Subtle shadow */
        }

        .applicant-profile p {
            margin-bottom: 10px;
        }

        .applicant-profile img {
            width: 200px; /* Adjust width as needed */
            height: 200px; /* Adjust height as needed */
            margin: 10px;
            border: 1px solid #ddd; /* Light gray border */
            border-radius: 5px; /* Rounded corners */
            display: inline-block; /* Display images inline */
        }

        .apprvbtn {
            background-color: #4CAF50; /* Green button */
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .back-button {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

@section('applicantsview')

    <div class="container mt-5">
        <a href="{{ route('applicants.details') }}" class="btn btn-secondary back-button">Back</a>

        <div class="applicant-profile">
            <h2 class="text-center">Applicant Profile</h2>
            <p><strong>Name:</strong> {{ $applicant->name }}</p>
            <p><strong>Email:</strong> {{ $applicant->email }}</p>
            <p><strong>Phone No:</strong> {{ $applicant->phone_no }}</p>
            <p><strong>Address:</strong> {{ $applicant->address }}</p>
            <p><strong>Date of Birth:</strong> {{ $applicant->dob }}</p>
            <p><strong>Gender:</strong> {{ $applicant->gender }}</p>
            <p><strong>Applicant Type:</strong> {{ $applicant->applicant_type }}</p>

            @if ($applicant->applicant_type == 'student')
                <p><strong>Department:</strong> {{ $applicant->department }}</p>
                <p><strong>Previous Education:</strong> {{ $applicant->previous_education }}</p>
                <p><strong>Marks:</strong> {{ $applicant->marks }}</p>
                <p><strong>Graduation Year:</strong> {{ $applicant->graduation_year }}</p>

                <!-- Display student-related images with lightbox and zoom -->
                <p><strong>Certificate:</strong></p>
                <a href="{{ asset('/pictures/' . $applicant->certificate_path) }}" data-lightbox="student-images">
                    <img src="{{ asset('/pictures/' . $applicant->certificate_path) }}" alt="Certificate">
                </a>

                <p><strong>Transfer Certificate (TC):</strong></p>
                <a href="{{ asset('/pictures/' . $applicant->tc_path) }}" data-lightbox="student-images">
                    <img src="{{ asset('/pictures/' . $applicant->tc_path) }}" alt="Transfer Certificate">
                </a>

                <p><strong>Character Certificate (CC):</strong></p>
                <a href="{{ asset('/pictures/' . $applicant->cc_path) }}" data-lightbox="student-images">
                    <img src="{{ asset ('/pictures/' . $applicant->cc_path) }}" alt="Character Certificate">
                </a>

                <p><strong>Marksheet:</strong></p>
                <a href="{{ asset('/pictures/' . $applicant->marksheet_path) }}" data-lightbox="student-images">
                    <img src="{{ asset('/pictures/' . $applicant->marksheet_path) }}" alt="Marksheet">
                </a>
            @endif

            @if ($applicant->applicant_type == 'staff')
                <p><strong>Subject:</strong> {{ $applicant->subject }}</p>
                <p><strong>Experience:</strong> {{ $applicant->experience }} years</p>

                <!-- Display staff-related images with lightbox and zoom -->
                <p><strong>Resume:</strong></p>
                <a href="{{ asset('/pictures/' . $applicant->resume_path) }}" data-lightbox="staff-images">
                    <img src="{{ asset('/pictures/' . $applicant->resume_path) }}" alt="Resume">
                </a>
            @endif

            <!-- Approve Button -->
            <form action="{{ route('applicant.approve', $applicant->id) }}" method="POST">
                @csrf
                <button class="apprvbtn" type="submit">Approve Applicant</button>
            </form>
        </div>
    </div>

    @endsection

    <script>
        lightbox.option({
            'resizeDuration': 200,
            'wrapAround': true,
            'alwaysShowNavOnTouchDevices': true,
            'fadeDuration': 200,
            'imageFadeDuration': 200,
            'disableScrolling': false,
            'positionFromTop': 100,
            'showImageNumberLabel': true,
            'closeOnClick': true // Allow closing on click
        });
    </script>

</body>

</html>