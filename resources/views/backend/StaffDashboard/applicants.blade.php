<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Applicants</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            /* light gray background */
        }

        .applicant {
            background-color: #fff;
            /* white background */
            padding: 20px;
            margin: 20px;
            border: 1px solid #ddd;
            /* light gray border */
            border-radius: 10px;
            /* rounded corners */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            /* subtle shadow */
        }

        .applicant p {
            margin-bottom: 10px;
        }

        .applicant button {
            background-color: #4CAF50;
            /* green button */
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .applicant button:hover {
            background-color: #3e8e41;
            /* darker green on hover */
        }

        .applicant form {
            display: inline-block;
            /* display form inline with button */
            margin-left: 10px;
        }
    </style>
</head>

<body>

@if($applicants->isNotEmpty())
    @foreach($applicants as $applicant)
    <div class="applicant">
        <p>Name: {{ $applicant->name }}</p>
        <p>Email: {{ $applicant->email }}</p>
        <!-- Add more fields as needed -->
        <button onclick="window.location='{{ route('admin.view', $applicant->id) }}'">View</button>
    </div>
    @endforeach
@else
    <p>No applicants found.</p>
@endif

</body>

</html>