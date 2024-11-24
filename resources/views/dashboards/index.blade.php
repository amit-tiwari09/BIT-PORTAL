<!DOCTYPE html>
<html lang="en">
{{ dd($month) }}
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Graph Insights1</title>

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
            height: auto;
            width: 80vw;
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            gap: 20px;
            margin: 0 auto;
        }

        /* Styling for the graph containers */
        .graph-container {
            width: 40%;
            height: 350px;
            background-color: white;
            margin: 20px auto;
        }

        /* Controls for the month and "View All" button */
        .controls {
            display: flex;
            justify-content: center;
            height: 6vh;
            align-items: center;
            gap: 22px;
            width: 100%;
            margin-top: 10px;
        }

        .btn {
            padding: 4px 6px;
            background-color: #007BFF;
            color: white;
            border-radius: 4px;
            text-decoration: none;
            font-size: 12px;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .btn:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
        }

        .btn:active {
            transform: translateY(0);
        }

        input[type="month"] {
            font-size: 10px;
            padding: 4px;
            margin: 0;
            border: 1px solid #007BFF;
            border-radius: 5px;
        }

        .no-expenditures {
            font-size: 16px;
            color: #d9534f;
        }

        .info {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 10px 0;
        }

        .info i {
            font-size: 20px;
            color: #007BFF;
            margin-right: 8px;
        }

        .info p {
            font-size: 14px;
            color: #333;
        }

        /* Styling for the events container */
        .events-container {
            width: 100%;
            background-color: white;
            padding: 20px;
            margin-top: 20px;
        }

        .event-card {
            background-color: #f9f9f9;
            padding: 15px;
            margin-bottom: 10px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .event-title {
            font-size: 18px;
            font-weight: bold;
        }

        .event-date,
        .event-time,
        .event-location {
            font-size: 14px;
            color: #555;
        }

        @media (max-width: 768px) {
            .container {
                width: 90%;
            }

            .graph-container {
                width: 90%;
            }

            .btn {
                font-size: 10px;
                padding: 3px 5px;
            }

            input[type="month"] {
                font-size: 8px;
            }

            .no-expenditures {
                font-size: 14px;
            }

            .info p {
                font-size: 12px;
            }
        }
    </style>
</head>

<body>

    <div class="container">
        <!-- Container for Expenditure Graph -->
        <div class="graph-container">
            <div class="container">
                <div class="chart-container">
                    <canvas id="expenditureChart"></canvas>
                </div>

                <div class="controls">
                    <!-- Form to select the month and year -->
                    <form method="GET" action="{{ route('expenditure.graph') }}">
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
        </div>

        <!-- Container for displaying events -->
        <div class="events-container">
            <h3>Upcoming Events</h3>

            @if($events->isEmpty())
                <p>No upcoming events found.</p>
            @else
                @foreach($events as $event)
                    <div class="event-card">
                        <div class="event-title">{{ $event->title }}</div>
                        <div class="event-date">Date: {{ \Carbon\Carbon::parse($event->date)->format('F j, Y') }}</div>
                        <div class="event-time">Time: {{ \Carbon\Carbon::parse($event->start_time)->format('g:i A') }} - {{ \Carbon\Carbon::parse($event->end_time)->format('g:i A') }}</div>
                        <div class="event-location">Location: {{ $event->location }}</div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

</body>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Get the canvas element context
        var ctx = document.getElementById('expenditureChart').getContext('2d');

        // Create the Chart.js chart
        var expenditureChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Total Expenditure'],
                datasets: [{
                    label: 'Total Expenditures for {{ $year }}-{{ $month }}',
                    data: [{{ $totalAmount }}], // Directly using the PHP variable
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
                    legend: {
                        display: false
                    },
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
                            font: {
                                size: 16,
                                weight: 'bold',
                                family: "'Roboto', sans-serif"
                            },
                            color: '#333'
                        },
                        grid: {
                            display: false
                        }
                    },
                    y: {
                        beginAtZero: true,
                        ticks: {
                            font: {
                                size: 16,
                                weight: 'bold',
                                family: "'Roboto', sans-serif"
                            },
                            color: '#333',
                            callback: function(value) {
                                return '₹' + value.toLocaleString();
                            }
                        },
                        grid: {
                            drawBorder: false,
                            color: 'rgba(200, 200, 200, 0.2)'
                        }
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

</html>
