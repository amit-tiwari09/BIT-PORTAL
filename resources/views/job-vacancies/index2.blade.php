@extends('backend.StaffDashboard.index')

@section('jobVacancy')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Job Vacancies</title>
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
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        .vacancy {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 15px;
            margin-bottom: 15px;
            transition: box-shadow 0.3s;
        }
        .vacancy:hover {
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }
        h3 {
            margin: 0;
            color: #007bff;
        }
        p {
            color: #555;
            margin: 10px 0;
        }
        a {
            display: inline-block;
            margin-top: 10px;
            padding: 8px 12px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s;
        }
        a:hover {
            background-color: #0056b3;
        }
        .create-job {
            display: block;
            width: 70%;
            text-align: center;
            margin: 20px auto;
            padding: 10px 15px;
            background-color: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s;
        }
        .create-job:hover {
            background-color: #218838;
        }
        .delete-btn {
            margin-top: 10px;
            padding: 8px 12px;
            background-color: #dc3545;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }
        .delete-btn:hover {
            background-color: #c82333;
        }

        /* Responsive Styles */
        @media (max-width: 600px) {
            .container {
                padding: 10px;
            }
            .create-job, .delete-btn {
                width: 100%;
                box-sizing: border-box;
            }
            h1 {
                font-size: 1.5em;
            }
            h3 {
                font-size: 1.2em;
            }
            p {
                font-size: 0.9em;
            }
        }
    </style>
</head>
<body>

@if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="container">
    <h1>Available Job Vacancies</h1>

    <!-- Button visible only to authenticated staff -->
    @auth('staff')
        <a href="{{ route('job-vacancies.create') }}" class="create-job">Create Job</a>
    @endauth
    
    @foreach($vacancies as $vacancy)
        <div class="vacancy">
            <h3>{{ $vacancy->title }}</h3>
            <p>{{ $vacancy->description }}</p>
            <a href="{{ route('job-vacancies.show', $vacancy->id) }}">View Details</a>

            <!-- Delete button for authenticated staff -->
            @auth('staff')
                <form action="{{ route('job-vacancies.destroy', $vacancy->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="delete-btn" onclick="return confirm('Are you sure you want to delete this job vacancy?');">
                        Delete
                    </button>
 </form>
            @endauth
        </div>
    @endforeach
</div>
</body>
</html>

@endsection