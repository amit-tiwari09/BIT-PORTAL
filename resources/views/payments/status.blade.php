@extends('backend.StudentDashboard.index')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Payment Status</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .container {
            margin-top: 50px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        h2 {
            margin-bottom: 20px;
            color: #343a40;
        }

        .badge-success {
            background-color: #28a745;
        }

        .badge-danger {
            background-color: #dc3545;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            transition: background-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .spinner-border {
            display: none;
            /* Hidden by default */
        }

        .table td {
            vertical-align: middle;
        }

        @media (max-width: 768px) {
            .container {
                padding: 15px;
            }

            h2 {
                font-size: 1.5rem;
            }

            .table-responsive {
                margin-bottom: 15px;
            }
        }

        footer {
            margin-top: 30px;
            text-align: center;
            color: #6c757d;
        }
    </style>
</head>

<body>
    @section('paymentStats')
    <div class="container">
        <h2>Your Payment Status</h2>

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>Semester</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach(range(1, 6) as $semester)
                    <tr>
                        <td>Semester {{ $semester }}</td>

                        <!-- Display Fee Amount -->
                        <td>
                            @if ($feeStructure && isset($feeStructure->{'semester' . $semester . '_fee'}))
                            {{ $feeStructure->{'semester' . $semester . '_fee'} }} <!-- Display fee amount for the semester -->
                            @else
                            N/A <!-- If fee not set, show N/A -->
                            @endif
                        </td>

                        <!-- Payment Status -->
                        <td>
                            @if ($payments->where('semester', $semester)->count())
                            <span class="badge badge-success" data-toggle="tooltip" title="Payment received">
                                <i class="fas fa-check-circle"></i> Paid
                            </span>
                            @else
                            <span class="badge badge-danger" data-toggle="tooltip" title="Payment not received">
                                <i class="fas fa-times-circle"></i> Unpaid
                            </span>
                            @endif
                        </td>

                        <!-- Pay Button -->
                        <td>
                            @if (!$payments->where('semester', $semester)->count())
                            <button class="btn btn-primary" onclick="paySemester({{ $semester }})">
                                Pay
                                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" style="display: none;"></span>
                            </button>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
    @endsection

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip();

            // Reset all spinners on page load
            $('.spinner-border').hide();

            // Re-enable all buttons on page load
            $('.btn-primary').prop('disabled', false);
        });

        function paySemester(semester) {
            // Show loading spinner
            const button = event.target;
            const spinner = button.querySelector('.spinner-border');
            spinner.style.display = 'inline-block';
            button.disabled = true; // Disable button to prevent multiple clicks

            // Redirect to the payment creation route with a slash before the semester
            const url = `{{ route('payments.create', ['semester' => '']) }}/${semester}`;
            window.location.href = url;
        }
    </script>

</body>

</html>