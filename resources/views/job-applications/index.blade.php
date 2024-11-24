<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Job Applicants</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 1200px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .card-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }

        .card {
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .card:hover {
            transform: scale(1.03);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .card-content {
            padding: 15px;
        }

        .card-content h3 {
            margin: 0;
            font-size: 1.2em;
            color: #007bff;
        }

        .card-content p {
            margin: 5px 0;
            font-size: 0.9em;
            color: #555;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>All Job Applicants</h1>

        @if($applications->isEmpty())
        <p>No applicants have applied for any jobs yet.</p>
        @else
        <div class="card-container">
            @foreach($applications as $application)
            @php

            $firstDocument = $documents[0] ?? null;
            // Get the student's profile image
            $studentImage = $application->student->image ?? null;
            @endphp
            <div class="card">
                <a href="{{ route('job-applications.show', $application->id) }}" style="text-decoration: none; color: inherit;">
                    @if($studentImage)
                    <!-- Display student image if it exists -->
                    <img src="{{ asset('pictures/' . $studentImage) }}" alt="Student Image">

                    @else
                    @foreach(json_decode($application->documents, true) as $index => $document)
                   
                
                    <img src="{{ asset('pictures/' . $document) }}" alt="Student Image">

                    
                    @endforeach
                    @endif
                    <div class="card-content">
                        <h3>{{ $application->student->name }}</h3>
                        <p>Applied for: {{ $application->jobVacancy->title }}</p>
                        <p>Application Date: {{ $application->created_at->format('d M, Y') }}</p>
                        <p>status: {{ $application->status}}</p>
                        
                    </div>
                </a>
            </div>

            @endforeach
        </div>
        @endif
    </div>
</body>

</html>