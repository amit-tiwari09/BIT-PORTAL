@extends('setting.index')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carousel Slides</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa; /* Light background */
            margin: 0;
            padding: 20px;
        }

        h1 {
            color: #343a40; /* Dark gray for headings */
            text-align: center;
            margin-bottom: 20px;
        }

        a {
            color: #007BFF; /* Blue for links */
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline; /* Underline on hover */
        }

        .container {
            max-width: 800px;
            margin: auto;
            background: white; /* White background for the container */
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .success-message {
            color: #28a745; /* Green for success messages */
            text-align: center;
            margin-bottom: 20px;
        }

        ul {
            list-style-type: none; /* Remove default list styles */
            padding: 0;
        }

        li {
            border: 1px solid #ddd; /* Light border for list items */
            border-radius: 5px;
            padding: 15px;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: #f9f9f9; /* Slightly darker background for list items */
        }

        img {
            max-width: 100px; /* Limit image size */
            border-radius: 5px; /* Rounded corners for images */
        }

        button {
            background-color: #dc3545; /* Red for delete button */
            color: white;
            border: none;
            border-radius: 5px;
            padding: 5px 10px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #c82333; /* Darker red on hover */
        }
    </style>
</head>
<body>
    @section('carousel')
    <div class="container">
        <h1>Carousel Slides</h1>
        <a href="{{ route('carousel.create') }}">Add New Slide</a>

        @if (session('success'))
            <p class="success-message">{{ session('success') }}</p>
        @endif

        <ul>
            @foreach($slides as $slide)
                <li>
                    <div>
                        <strong>{{ $slide->main_text }}</strong> - {{ $slide->secondary_text }}
                        @if($slide->image)
                            <img src="{{ asset('carousel_images/' . $slide->image) }}" alt="{{ $slide->main_text }}">
                        @endif
                    </div>
                    <div>
                        <a href="{{ route('carousel.edit', $slide->id) }}">Edit</a>
                        <form action="{{ route('carousel.destroy', $slide->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>

    @endsection
</body>
</html>