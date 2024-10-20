<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Slide</title>
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

        .container {
            max-width: 600px;
            margin: auto;
            background: white; /* White background for the container */
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .alert {
            background-color: #f8d7da; /* Light red background for alerts */
            color: #721c24; /* Dark red for alert text */
            border: 1px solid #f5c6cb; /* Red border */
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #495057; /* Darker gray for labels */
        }

        input[type="text"],
        input[type="file"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ced4da; /* Light border */
            border-radius: 5px;
            box-sizing: border-box;
            margin-bottom: 15px;
        }

        button {
            background-color: #007BFF; /* Blue for button */
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 15px;
            cursor: pointer;
            transition: background-color 0.3s;
            width: 100%; /* Full width button */
        }

        button:hover {
            background-color: #0056b3; /* Darker blue on hover */
        }
    </style>
</head>
<body>
    <div class="container">
        @if ($errors->any())
            <div class="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <h1>Add New Slide</h1>
        <form action="{{ route('carousel.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="main_text">Main Text:</label>
                <input type="text" name="main_text" required>
            </div>
            <div>
                <label for="secondary_text">Secondary Text:</label>
                <input type="text" name="secondary_text">
            </div>
            <div>
                <label for="image">Image:</label>
                <input type="file" name="image">
            </div>
            <button type="submit">Add Slide</button>
        </form>
    </div>
</body>
</html>