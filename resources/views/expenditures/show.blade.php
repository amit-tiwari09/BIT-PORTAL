@extends('backend.StaffDashboard.index')
@section('showexpense')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expenditure Details</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f7fa;
            color: #333;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #007BFF;
            margin-bottom: 20px;
        }

        .card {
            background: #f9f9f9;
            border-radius: 8px;
            padding: 15px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .card h3 {
            margin-top: 0;
            color: #333;
        }

        .card p {
            margin: 5px 0;
        }

        .btn {
            display: inline-block;
            padding: 10px 15px;
            background-color: #007BFF;
            color: white;
            border-radius: 4px;
            text-decoration: none;
            text-align: center;
            transition: background-color 0.3s ease, transform 0.2s ease;
            margin-top: 15px;
        }

        .btn:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
        }

        .btn:active {
            transform: translateY(0);
        }

        @media (max-width: 768px) {
            .container {
                margin: 20px;
                padding: 15px;
            }

            h1 {
                font-size: 24px;
            }

            .card h3 {
                font-size: 20px;
            }

            .btn {
                font-size: 14px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Expenditure Details</h1>

        <!-- Display Expenditure Details -->
        <div class="card">
            <div class="card-body">
                <h3>Item: {{ $expenditure->item }}</h3>
                <p><strong>Amount:</strong> {{ number_format($expenditure->amount, 2) }}</p>
                <p><strong>Date:</strong> {{ \Carbon\Carbon::parse($expenditure->date)->format('d-m-Y') }}</p>
                <p><strong>Person:</strong> {{ $expenditure->person_name }}</p>
                <p><strong>Description:</strong> {{ $expenditure->description }}</p>
            </div>
        </div>

        <a href="{{ route('expenditures.index') }}" class="btn">Back to Expenditures</a>
    </div>
</body>

</html>
@endsection