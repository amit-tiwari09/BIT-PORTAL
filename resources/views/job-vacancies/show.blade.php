<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h3 {
            color: #007bff;
            margin: 0 0 10px;
        }
        p {
            color: #555;
            margin: 10px 0;
            line-height: 1.6;
        }
        h4 {
            margin-top: 20px;
            color: #333;
        }
        ul {
            padding-left: 20px;
            color: #555;
        }
        li {
            margin-bottom: 5px;
        }
        label {
            display: block;
            margin: 10px 0 5px;
            color: #555;
        }
        input[type="file"] {
            margin-bottom: 15px;
            padding: 5px;
            width: 100%; /* Full width for better usability on mobile */
            box-sizing: border-box; /* Include padding in width calculation */
        }
        button {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
            width: 100%; /* Full width button for better usability */
        }
        button:hover {
            background-color: #218838;
        }
        .error-messages {
            color: red;
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid red;
            border-radius: 4px;
            background-color: #ffe6e6; /* Light red background */
        }

        /* Responsive Styles */
        @media (max-width: 600px) {
            .container {
                padding: 15px;
            }
            h3 {
                font-size: 1.5em; /* Adjust font size for smaller screens */
            }
            p {
                font-size: 0.9em; /* Adjust font size for smaller screens */
            }
            button {
                padding: 12px; /* Slightly larger padding for touch targets */
            }
        }
    </style>
</head>
<body>

@if ($errors->any())
    <div class="error-messages">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <div class="container">
        <h3>{{ $job->title }}</h3>
        <p>{{ $job->description }}</p>

        <h4>Required Documents:</h4>
        <ul>
            @foreach(json_decode($job->required_documents) as $document)
                <li>{{ $document }}</li>
            @endforeach
        </ul>

        <form action="{{ route('job-vacancies.apply', $job->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @foreach(json_decode($job->required_documents) as $document)
                <label>{{ $document }}</label>
                <input type="file" name="documents[]" required> <!-- Use documents[] for multiple uploads -->
            @endforeach
            <button type="submit">Apply</button>
        </form>
    </div>
</body>
</html>