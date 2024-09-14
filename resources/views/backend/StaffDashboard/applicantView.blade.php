<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Lightbox2 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" rel="stylesheet" />

    <!-- Lightbox2 JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            /* light gray background */
        }

        .lb-close {
            display: block !important;
            position: absolute;
            top: 10px;
            right: 10px;
            width: 30px;
            height: 30px;
            background-color: #fff;
            /* white background */
            border-radius: 50%;
            /* rounded corners */
            border: 1px solid #ccc;
            /* optional border */
            cursor: pointer;
            z-index: 9999;
        }

        .applicant-profile {
            max-width: 800px;
            /* adjust width as needed */
            margin: 40px auto;
            /* center the profile */
            padding: 20px;
            background-color: #fff;
            /* white background */
            border: 1px solid #ddd;
            /* light gray border */
            border-radius: 10px;
            /* rounded corners */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            /* subtle shadow */
        }

        .applicant-profile p {
            margin-bottom: 10px;
        }

        .applicant-profile img {
            width: 200px;
            /* adjust width as needed */
            height: 200px;
            /* adjust height as needed */
            margin: 10px;
            border: 1px solid #ddd;
            /* light gray border */
            border-radius: 5px;
            /* rounded corners */
            display: inline-block;
            /* display images inline */
        }

        .applicant-profile img:nth-child(4n+1) {
            margin-left: 0;
            /* reset margin left for every 4th image */
        }

        .applicant-profile canvas {
            margin: 20px;
            border: 1px solid #ddd;
            /* light gray border */
            border-radius: 5px;
            /* rounded corners */
        }

        .apprvbtn {
            background-color: #4CAF50;
            /* green button */
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>

<body>
   
    <div class="applicant-profile">
        <p>Name: {{ $applicant->name }}</p>
        <p>Email: {{ $applicant->email }}</p>
        <p>Phone No: {{ $applicant->phone_no }}</p>
        <p>Address: {{ $applicant->address }}</p>
        <p>Date of Birth: {{ $applicant->dob }}</p>
        <p>Gender: {{ $applicant->gender }}</p>
        <p>Applicant Type: {{ $applicant->applicant_type }}</p>

        @if ($applicant->applicant_type == 'student')
        <p>Department: {{ $applicant->department }}</p>
        <p>Previous Education: {{ $applicant->previous_education }}</p>
        <p>Marks: {{ $applicant->marks }}</p>
        <p>Graduation Year: {{ $applicant->graduation_year }}</p>

        <!-- Display student-related images with lightbox and zoom -->
        <p>Certificate:</p>
        <a href="{{ asset('/pictures/' . $applicant->certificate_path) }}" data-lightbox="student-images">
            <img src="{{ asset('/pictures/' . $applicant->certificate_path) }}" alt="Certificate" style="width: 200px;">
        </a>

        <p>Transfer Certificate (TC):</p>
        <a href="{{ asset('/pictures/' . $applicant->tc_path) }}" data-lightbox="student-images">
            <img src="{{ asset('/pictures/' . $applicant->tc_path) }}" alt="Transfer Certificate" style="width: 200px;">
        </a>

        <p>Character Certificate (CC):</p>
        <a href="{{ asset('/pictures/' . $applicant->cc_path) }}" data-lightbox="student-images">
            <img src="{{ asset('/pictures/' . $applicant->cc_path) }}" alt="Character Certificate" style="width: 200px;">
        </a>

        <p>Marksheet:</p>
        <a href="{{ asset('/pictures/' . $applicant->marksheet_path) }}" data-lightbox="student-images">
            <img src="{{ asset('/pictures/' . $applicant->marksheet_path) }}" alt="Marksheet" style="width: 200px;">
        </a>
        @endif

        @if ($applicant->applicant_type == 'staff')
        <p>Subject: {{ $applicant->subject }}</p>
        <p>Experience: {{ $applicant->experience }} years</p>

        <!-- Display staff-related images with lightbox and zoom -->
        <p>Resume:</p>
        <a href="{{ asset('/pictures/' . $applicant->resume_path) }}" data-lightbox="staff-images">
            <img src="{{ asset('/pictures/' . $applicant->resume_path) }}" alt="Resume" style="width: 200px;">
        </a>
        @endif

        <div class="applicant-profile">
            <!-- Existing Profile Details -->

            <!-- Approve Button -->
            <form action="{{ route('applicant.approve', $applicant->id) }}" method="POST">
                @csrf
                <button class="apprvbtn" type="submit" class="btn btn-success">Approve Applicant</button>
            </form>
        </div>

    </div>

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

    </div>

</body>

</html>