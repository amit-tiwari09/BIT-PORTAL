
@extends('backend.StaffDashboard.index')
@section('indexexpense')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expenditure</title>
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
            max-width: 800px;
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

        .btn-view,
        .btn-add {
            display: inline-block;
            padding: 8px 12px;
            background-color: #007BFF;
            color: white;
            border-radius: 4px;
            text-decoration: none;
            text-align: center;
            transition: background-color 0.3s ease, transform 0.2s ease;
            margin-right: 10px;
        }

        .btn-view:hover,
        .btn-add:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
        }

        .btn-view:active,
        .btn-add:active {
            transform: translateY(0);
        }

        h2 {
            color: #555;
            margin-bottom: 15px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #007BFF;
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .no-expenditures {
            text-align: center;
            font-size: 18px;
            color: #777;
        }

        @media (max-width: 768px) {
            .container {
                margin: 20px;
                padding: 15px;
            }

            h1 {
                font-size: 24px;
            }

            h2 {
                font-size: 20px;
            }

            th,
            td {
                font-size: 14px;
                padding: 10px;
            }

        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Expenditure List</h1>

        <!-- Add Expenses Button -->
        <a href="{{ route('expenditures.create') }}" class="btn-add">
            <i class="fas fa-plus-circle"></i> Add Expenses
        </a>

        <a href="{{ route('dashboard.graph') }}" class="btn-add">
            <i class="fa-solid fa-chart-pie"></i> graph
        </a>

        <h2>All Expenditures</h2>

        <!-- Check if there are no expenditures -->
        @if($expenditures->isEmpty())
        <p class="no-expenditures">No expenditures found.</p>
        @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Item</th>
                    <th>Amount</th>
                    <th>Date</th>
                    <th>Person</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($expenditures as $expenditure)

                <tr>

                    <td>{{ $expenditure->id }}</td>
                    <td>{{ $expenditure->item }}</td>
                    <td>{{ number_format($expenditure->amount, 2) }}</td>
                    <td>{{ \Carbon\Carbon::parse($expenditure->date)->format('d-m-Y') }}</td>
                    <td>{{ $expenditure->person_name }}</td>
                    <td>{{ $expenditure->description }}</td>
                    <td><a href="{{ route('expenditure.show', $expenditure->id) }}" class="btn-view">view</a></td>
                </tr>

                @endforeach
            </tbody>
        </table>
        @endif
    </div>
</body>

</html>
@endsection