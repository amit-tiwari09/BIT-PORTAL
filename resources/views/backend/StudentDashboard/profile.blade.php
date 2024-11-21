@extends('backend.StudentDashboard.index')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Profile</title>
    <script src="https://kit.fontawesome.com/c9cb99f12f.js" crossorigin="anonymous"></script>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            background-color: #f9f9f9;
            color: #333;
        }

        .profile-container {
            max-width: 800px;
            margin: 20px auto;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            padding: 20px;
            transition: box-shadow 0.3s ease;
        }

        .profile-container:hover {
            box-shadow: 0 8px 40px rgba(0, 0, 0, 0.2);
        }

        .profile-header {
            display: flex;
            align-items: center;
            border-bottom: 2px solid #f0f0f0;
            padding-bottom: 15px;
        }

        .profile-img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-right: 20px;
            border: 2px solid #ddd;
            object-fit: cover;
        }

        .profile-info h2 {
            margin: 0;
            font-size: 24px;
            color: #007BFF;
        }

        .profile-info p {
            margin: 5px 0;
            color: #555;
        }

        .profile-details {
            margin-top: 20px;
        }

        .profile-section {
            margin-bottom: 20px;
        }

        .profile-section h3 {
            margin-bottom: 10px;
            font-size: 20px;
            color: #007BFF;
            border-left: 4px solid #007BFF;
            padding-left: 10px;
        }

        .profile-section ul {
            list-style: none;
            padding: 0;
        }

        .profile-section ul li {
            padding: 8px 0;
            font-size: 16px;
            color: #555;
        }

        .profile-section ul li strong {
            color: #333;
        }

        .documents a {
            color: #007BFF;
            text-decoration: none;
        }

        .documents a:hover {
            text-decoration: underline;
        }

        .edit-link {
            display: inline-block;
            margin-top: 10px;
            padding: 10px 15px;
            background: #007BFF;
            color: #fff;
            border-radius: 5px;
            text-decoration: none;
            transition: background 0.3s ease;
        }

        .edit-link:hover {
            background: #0056b3;
        }

        @media (max-width: 768px) {
            .profile-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .profile-img {
                margin-bottom: 10px;
            }

            .profile-info h2 {
                font-size: 20px;
            }

            .profile-section h3 {
                font-size: 18px;
            }
        }
    </style>
</head>

<body>
    @section('studentprofile')
    <div class="profile-container">
        <div class="profile-header">
            <img src="{{ asset('pictures/'.$Student->image)}}" 
                 alt="Profile Picture" class="profile-img">
            <div class="profile-info">
                <h2>{{ $Student->name }}</h2>
                <p><strong>Registration No:</strong> {{ $Student->registration_no }}</p>
                <p><strong>Department:</strong> {{ $Student->department }}</p>
            </div>
        </div>
        <div class="profile-details">
            <div class="profile-section">
                <h3>Personal Details</h3>
                <ul>
                    <li><strong>Email:</strong> {{ $Student->email }}</li>
                    <li><strong>Phone No:</strong> {{ $Student->phone_no }}</li>
                    <li><strong>Address:</strong> {{ $Student->address }}</li>
                    <li><strong>Date of Birth:</strong> {{ $Student->dob }}</li>
                    <li>< strong>Gender:</strong> {{ ucfirst($Student->gender) }}</li>
                </ul>
            </div>
            <div class="profile-section">
                <h3>Academic Details</h3>
                <ul>
                    <li><strong>Previous Education:</strong> {{ $Student->previous_education }}</li>
                    <li><strong>Marks:</strong> {{ number_format($Student->marks, 2) }}%</li>
                    <li><strong>Graduation Year:</strong> {{ $Student->graduation_year }}</li>
                    <li><strong>Admission Date:</strong> {{ $Student->admission_date }}</li>
                    <li><strong>Faculty:</strong> {{ $Student->faculty }}</li>
                </ul>
            </div>
            <div class="profile-section">
                <h3>Documents</h3>
                <ul class="documents">
                    <li><strong>Certificate:</strong> 
                        <a href="{{ $Student->certificate_path ? asset('pictures/' . $Student->certificate_path) : '#' }}" target="_blank">
                            {{ $Student->certificate_path ? 'View' : 'Not Available' }}
                        </a>
           
                    <li><strong>Transfer Certificate:</strong> 
                        <a href="{{ $Student->tc_path ? asset('pictures/' . $Student->tc_path) : '#' }}" target="_blank">
                            {{ $Student->tc_path ? 'View' : 'Not Available' }}
                        </a>
                    </li>
                    <li><strong>Character Certificate:</strong> 
                        <a href="{{ $Student->cc_path ? asset('pictures/' . $Student->cc_path) : '#' }}" target="_blank">
                            {{ $Student->cc_path ? 'View' : 'Not Available' }}
                        </a>
                    </li>
                    <li><strong>Marksheet:</strong> 
                        <a href="{{ $Student->marksheet_path ? asset('pictures/' . $Student->marksheet_path) : '#' }}" target="_blank">
                            {{ $Student->marksheet_path ? 'View' : 'Not Available' }}
                        </a>
                    </li>
                </ul>
                <a href="{{route('profile.edit')}}" class="edit-link">
                    <i class="fa-solid fa-pen-to-square"></i> Edit
                </a>
            </div>
        </div>
    </div>
    @endsection
</body>

</html>