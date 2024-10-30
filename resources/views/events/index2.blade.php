<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upcoming Events</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 30px;
        }

        .section-heading {
            text-align: center;
            margin-bottom: 30px;
            font-size: 2rem;
            font-weight: bold;
        }

        .event-item {
            border-radius: 10px;
            transition: transform 0.2s;
            background: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .event-item:hover {
            transform: scale(1.05);
        }

        .date-label {
            text-align: center;
            font-size: 1.5rem;
            color: #007bff;
        }

        .date-number {
            font-size: 2rem;
            font-weight: bold;
        }

        .title {
            font-size: 1.25rem;
            margin: 10px 0;
        }

        .time,
        .location,
        .time-left {
            font-size: 0.9rem;
            color: #6c757d;
        }

        .time i,
        .location i,
        .time-left i {
            margin-right: 5px;
        }
    </style>
</head>

<body>

    <div class="container">
        <!-- Back Button -->
        <a href="{{ route('home') }}" class="btn btn-outline-primary mb-4">
            <i class="fas fa-arrow-left"></i> Back to Home
        </a>

        <h1 class="section-heading">Upcoming Events</h1>

        @if ($events->isEmpty())
        <p class="text-center">No upcoming events found.</p>
        @else
        <div class="row">
            @foreach($events as $event)
            <div class="col-md-3 mb-4"> <!-- 4 cards in a row -->
                <div class="event-item card">
                    <div class="card-body text-center">
                        <p class="date-label">
                            <span class="month">{{ \Carbon\Carbon::parse($event->date)->format('M') }}</span>
                            <span class="date-number">{{ \Carbon\Carbon::parse($event->date)->format('d') }}</span>
                        </p>
                        <div class="details">
                            <h2 class="title">{{ $event->title }}</h2>
                            <p class="time">
                                <i class="far fa-clock"></i>
                                {{ \Carbon\Carbon::parse($event->date . ' ' . $event->start_time)->format('h:i A') }} -
                                {{ \Carbon\Carbon::parse($event->date . ' ' . $event->end_time)->format('h:i A') }}
                            </p>
                            <p class="location">
                                <i class="fas fa-map-marker-alt"></i>{{ $event->location }}
                            </p>

                        </div><!--//details-->
                    </div><!--//card-body-->
                </div><!--//event-item-->
            </div><!--//col-md-3-->
            @endforeach


        </div><!--//row-->
        @endif
    </div>

    <!-- Bootstrap JS and dependencies (jQuery and Popper.js) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>