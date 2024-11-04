@extends('backend.StaffDashboard.index')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Payments</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://kit.fontawesome.com/c9cb99f12f.js" crossorigin="anonymous"></script>
</head>

<body>
    <style>

    </style>

    @section('studentPayment')
    <div class="container mt-5">
        <h2>Student Payment Records</h2>
        @if(auth()->guard('staff')->check() && auth()->guard('staff')->user()->role == 'principal')
        <a href="{{ route('fee_structures.index') }}" class="btn btn-primary mb-3">Manage Fee Structure</a>
        @endif

        <div class="form-group" style="display: flex; justify-content:space-between; align-items:center;">
            
            <span style="display: flex; align-items:center; justify-content:center; gap:0px;">
            <label for="departmentFilter">Filter by Department: </label>
                <select id="departmentFilter" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; width:64%; padding-left:6px;" class="form-control mb-3">
                    <option value="">All Departments</option>
                    <option value="computer">Computer</option>
                    <option value="civil">Civil</option>
                    <option value="mechanical">Mechanical</option>
                    <option value="electrical">Electrical</option>
                    <option value="electronics">Electronics</option>
                </select>

            </span>
            <input type="text" style="padding-left:5px; width:25%; box-shadow: 0 0 5pt 0.5pt #D3D3D3;" id="search" placeholder="Search by name or email" class="form-control mb-3">
        </div>

        

        <div id="search-results" style="display: none;">
            <h3>Search Results:</h3>
            <table class="table table-bordered table-hover mt-4">
                <thead>
                    <tr>
                        <th>Student ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Paid Semesters</th>
                        <th>Total Paid</th>
                    </tr>
                </thead>
                <tbody id="search-results-body">
                    <!-- Search results will be injected here dynamically -->
                </tbody>
            </table>
        </div>

        <div id="main-table">
            <table class="table table-bordered table-hover mt-4">
                <thead>
                    <tr>
                        <th>Student ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Paid Semesters</th>
                        <th>Total Paid</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $student)
                    <tr data-department-id="{{ strtolower($student->department) }}">
                        <td>{{ $student->id }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->email }}</td>
                        <td>
                            @if($student->payments->isNotEmpty())
                            <ul>
                                @foreach($student->payments as $payment)
                                <li>Semester {{ $payment->semester }} - NPR:- {{ number_format($payment->amount, 2) }} on {{ \Carbon\Carbon::parse($payment->payment_date)->format('Y-m-d') }}</li>
                                @endforeach
                            </ul>
                            @else
                            <em>No payments recorded</em>
                            @endif
                        </td>
                        <td>
                            NPR{{ number_format($student->payments->sum('amount'), 2) }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#search').on('keyup', function() {
                filterStudents();
            });

            $('#departmentFilter').on('change', function() {
                filterStudents();
            });

            function filterStudents() {
                let query = $('#search').val().toLowerCase();
                let selectedDepartment = $('#departmentFilter').val();

                $('#main-table tbody tr').each(function() {
                    let studentName = $(this).find('td:nth-child(2)').text().toLowerCase();
                    let studentEmail = $(this).find('td:nth-child(3)').text().toLowerCase();
                    let studentDepartmentId = $(this).data('department-id');

                    if ((studentName.includes(query) || studentEmail.includes(query)) &&
                        (selectedDepartment === '' || studentDepartmentId === selectedDepartment)) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });

                // Handle search results display
                let visibleRows = $('#main-table tbody tr:visible');
                if (visibleRows.length === 0) {
                    $('#search-results-body').html('<tr><td colspan="5">No results found.</td></tr>');
                    $('#search-results').show(); // Show even if no results
                } else {
                    $('#search-results').hide(); // Hide search results if main table has visible rows
                }
            }
        });
    </script>

    @endsection
</body>

</html>