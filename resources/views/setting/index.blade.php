<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings Page</title>
    <script src="https://kit.fontawesome.com/c9cb99f12f.js" crossorigin="anonymous"></script>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }

        .main-container {
            display: flex;
            flex-direction: column;
            padding: 20px;
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .top-area {
            display: flex;
            gap: 10px;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
        }

        .top-area a {
            padding: 10px 20px;
            background-color: #4CAF50; /* Green */
            border: none;
            color: white;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

         .top-area a:hover {
            background-color: #3e8e41;
        }

        .back-button {
            background-color: #333;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 4px;
            transition: background-color 0.3s;
            margin-right: 10px;
        }

        .back-button:hover {
            background-color: #444;
        }

        .bottom-area {
            margin-top: 20px;
            padding: 20px;
        }

        h2 {
            font-size: 24px;
            margin-bottom: 10px;
            color: #333;
        }

        h3 {
            font-size: 18px;
            margin-bottom: 10px;
            color: #333;
        }

        p {
            margin-bottom: 20px;
        }

        .bottom-area > * {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

    <div class="main-container">
        <!-- Top Area with Navigation Links and Back Button -->
        <div class="top-area">
            <a class="back-button" href="{{route('staffdashboard')}}" ><i class="fas fa-arrow-left"></i> Back to Dashboard</a>
            <a href="{{ route('social_media_links.index') }}"><i class="fab fa-facebook-f"></i> Social Links</a>
            <a href="{{ route('nav.index') }}"><i class="fas fa-bars"></i> Nav Links</a>
            <a href="{{ route('carousel.index') }}"><i class="fas fa-slideshow"></i> Home Carousel</a>
            <a href="{{ route('promos.index') }}"><i class="fas fa-slideshow"></i> Promos</a>
            <!-- Add more links as needed -->
        </div>

        <!-- Bottom Area to Display Form Content -->
        <div class="bottom-area">
            @yield('social')
            @yield('nav')
            @yield('carousel')
            @yield('promo')
        </div>
    </div>

</body>
</html>