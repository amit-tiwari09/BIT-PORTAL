@extends('backend.StaffDashboard.index')
@section('dashboard')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monthly Expenditures</title>
    <!-- Include Chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f7fa;
            color: #333;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            padding: 2em;
            max-width: 1200px;
            margin: 0 auto;
            height: auto;
            /* background-color: red; */
        }

        .graph-container {
            flex: 1 1 calc(45% - 20px); /* Adjust width and spacing */
            background-color: white;
            margin: 1em;
            padding: 1.5em; /* Adjusted for responsiveness */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 50vh;
        }

        .chart-container {
            position: relative;
            height: 250px;
            width: 100%;
            margin: 0 auto;
        }

        .controls {
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: center;
            margin-top: 1em;
            gap: 0.5em; /* Adjusted for responsiveness */
        }

        .btn {
            padding: 0.5em 1em; /* Use em for responsiveness */
            background-color: #007BFF;
            color: white;
            border-radius: 4px;
            text-decoration: none;
            text-align: center;
            transition: background-color 0.3s ease, transform 0.2s ease;
            font-size: 1em; /* Use em for responsiveness */
        }

        .btn:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
        }

        .btn:active {
            transform: translateY(0);
        }

        input[type="month"] {
            font-size: 0.9em; /* Use em for responsiveness */
            padding: 0.5em;
            margin: 0;
            border: 1px solid #007BFF;
            border-radius: 5px;
            outline: none;
            transition: border-color 0.3s;
        }

        input[type="month"]:focus {
            border-color: #0056b3;
        }

        .no-expenditures {
            font-size: 1em; /* Use em for responsiveness */
            color: #d9534f;
            text-align: center;
        }

        .info {
            display: flex;
            justify-content: center;
            align-items: center;
            /* margin-top: 1em; */
            /* gap: 0.5em;  */
        }

        .info i {
            font-size: 1.2em; /* Use em for responsiveness */
            color: #007BFF;
            margin-right: 0.3em; /* Adjusted for responsiveness */
            margin-bottom: 13px;
        }

        .info p {
            font-size: 0.9em; /* Use em for responsiveness */
            color: #333;
        }

        @media (max-width: 768px) {
            .graph-container {
                flex: 1 1 100%; /* Full width on small screens */
            }

            .btn {
                font-size: 0.9em; /* Use em for responsiveness */
                padding: 0.4em 0.8em; /* Use em for responsiveness */
            }

            input[type="month"] {
                font-size: 0.8em; /* Use em for responsiveness */
            }

            .no-expenditures {
                font-size: 0.9em; /* Use em for responsiveness */
            }

            .info p {
                font-size: 0.8em; /* Use em for responsiveness */
            }
        }
    </style>
</head <body>
    <div class="container">
        <!-- First Graph Container (Expenditure Graph, Calendar, Button, Expenditure Info) -->
        <div class="graph-container">
            <div class="chart-container">
                <canvas id="expenditureChart1"></canvas>
            </div>

            <!-- Controls for Graph 1 -->
            <div class="controls">
                <form method="GET" action="{{ route('dashboard.graph') }}">
                    <input type="month" name="monthYear" value="{{ old('monthYear', $year.'-'.$month) }}" max="{{ now()->format('Y-m') }}" onchange="this.form.submit()">
                </form>
                <a href="{{ route('expenditures.index') }}" class="btn">View All</a>
            </div>

            @if($noExpenditures)
            <p class="no-expenditures">No expenditures found for the selected month/year.</p>
            @else
            <div class="info">
                <i class="fas fa-wallet"></i>
                <p>Total Expenditure: <strong>₹{{ number_format($totalAmount, 2) }}</strong></p>
            </div>
            @endif
        </div>

        <!-- Second Graph Container (Student Admissions per Year) -->
        <div class="graph-container">
            <div class="chart-container">
                <canvas id="studentChart"></canvas>
            </div>

            <!-- Display Total Students Info -->
            <div class="info">
                <i class="fas fa-users"></i>
                <p>Total Students: <strong>{{ $totalStudents }}</strong></p>
            </div>
            <div class="info">
                <i class="fas fa-users"></i>
                <p>Total Students Admitted This Year: <strong>{{ $studentsThisYear }}</strong></p>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Expenditure Chart (Bar Graph)
            var ctx1 = document.getElementById('expenditureChart1').getContext('2d');
            var expenditureChart1 = new Chart(ctx1, {
                type: 'bar',
                data: {
                    labels: ['Total Expenditure'],
                    datasets: [{
                        label: 'Total Expenditures for {{ $year }}-{{ $month }}',
                        data: [{{ $totalAmount }}], 
                        backgroundColor: 'rgba(54, 162, 235, 0.8)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 2,
                        hoverBackgroundColor: 'rgba(54, 162, 235, 1)',
                        hoverBorderColor: 'rgba(54, 162, 235, 1)',
                        borderRadius: 10,
                        barPercentage: 0.5,
                        categoryPercentage: 0.5
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    return '₹' + context.raw.toFixed(2);
                                }
                            }
                        }
                    },
                    scales: {
                        x: {
                            ticks: {
                                font: { size: 16, weight: 'bold' },
                                color: '#333'
                            },
                            grid: { display: false }
                        },
                        y: {
                            beginAtZero: true,
                            ticks: {
                                font: { size: 16, weight: 'bold' },
                                color: '#333',
                                callback: function(value) {
                                    return '₹' + value.toLocaleString();
                                }
                            },
                            grid: { drawBorder: false, color: 'rgba(200, 200, 200, 0.2)' }
                        }
                    },
                    animation: {
                        duration: 1500,
                        easing: 'easeOutBounce'
                    }
                }
            });

            // Student Admission Chart (Line Graph)
            var ctx2 = document.getElementById('studentChart').getContext('2d');
            var studentChart = new Chart(ctx2, {
                type: 'line',
                data: {
                    labels: @json($years),
                    datasets: [{
                        label: 'Number of Students Admitted',
                        data: @json(array_values($studentsPerYear)),
                        borderColor: 'rgba(75, 192, 192, 1)',
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderWidth: 2,
                        fill: true,
                        tension: 0.4
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'top',
                            labels: {
                                font: { size: 16, weight: 'bold' }
                            }
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    return context.raw + ' students';
                                }
                            }
                        }
                    },
                    scales: {
                        x: {
                            ticks: { font: { size: 16 }, color: '#333' },
                            grid: { display: false }
                        },
                        y: {
                            ticks: { font: { size: 16 }, color: '#333' },
                            grid: { drawBorder: false, color: 'rgba(200, 200, 200, 0.2)' }
                        }
                    },
                    animation: {
                        duration: 1500,
                        easing: 'easeOutBounce'
                    }
                }
            });
        });
    </script>
</body>

</html>
@endsection