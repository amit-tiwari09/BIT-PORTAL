<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>College Green</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            color: #333;
        }

        .main-container {
            margin-top: 20px;
        }

        .carousel-item {
            height: 400px;
            background-color: #f5f5f5;
        }

        .carousel-item img {
            height: 100%;
            object-fit: cover;
        }

        .carousel-caption {
            position: absolute;
            bottom: 10px;
            left: 10px;
            background-color: rgba(0, 0, 0, 0.5);
            color: #fff;
            padding: 10px;
        }

        .main {
            font-size: 24px;
            font-weight: bold;
        }

        .secondary {
            font-size: 18px;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            color: #fff;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
        }

        .btn-primary:hover {
            background-color: #0062cc;
        }

 .carousel-control-prev-icon, .carousel-control-next-icon {
            background-image: none;
        }

        .carousel-control-prev, .carousel-control-next {
            width: 5%;
            background-color: rgba(0, 0, 0, 0.5);
            border: none;
            border-radius: 50%;
            height: 40px;
            width: 40px;
            top: 50%;
            transform: translateY(-50%);
        }

        .carousel-control-prev:hover, .carousel-control-next:hover {
            background-color: rgba(0, 0, 0, 0.8);
        }
    </style>
</head>
<body>
    <div class="main-container">
        <div id="carouselExample" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner slides">
                @foreach($slides as $index => $slide)
                <div class="carousel-item {{ $index === 0 ? 'active' : '' }} slide-{{ $index + 1 }}">
                    <div class="carousel-caption text-start">
                        <span class="main">{{ $slide->main_text }}</span>
                        <br />
                        <span class="secondary">{{ $slide->secondary_text }}</span>
                    </div>
                    @if($slide->image)
                    <img src="{{ asset('carousel_images/' . $slide->image) }}" class="d-block w-100" alt="{{ $slide->main_text }}">
                    @endif
                </div>
                @endforeach
            </div>

            <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExample" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>