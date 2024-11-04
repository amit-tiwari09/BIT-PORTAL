@extends('backend.StaffDashboard.index')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Gallery Image</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: #f9f9f9;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .form-container {
            width: 100%;
            max-width: 600px;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }

        .form-group input[type="text"],
        .form-group input[type="file"],
        .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
        }

        .form-group img {
            max-width: 100px; /* Smaller image preview */
            height: auto;
            border: 1px solid #ddd;
            margin-bottom: 10px;
            border-radius: 4px;
        }

        .button {
            background-color: #007BFF;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 10px;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .button:hover {
            background-color: #0056b3;
        }

        .button.cancel {
            background-color: #dc3545; /* Red for cancel */
            margin-left: 10px;
        }

        .button.cancel:hover {
            background-color: #c82333;
        }

        @media (max-width: 600px) {
            .form-container {
                width: 90%;
            }

            .button {
                width: 100%;
                margin-top: 10px;
            }
        }
    </style>
</head>

<body>

@section('editgallery')
    <h1>Edit Gallery Image</h1>

    <div class="form-container">
        <form action="{{ route('gallery.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="image">Current Image:</label>
                <img src="{{ asset($gallery->image_path) }}" alt="Current Image">
                <label for="image">Upload New Image (optional):</label>
                <input type="file" name="image" accept="image/*">
                @error('image')
                <div style="color: red;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <input type="text" name="description" value="{{ old('description', $gallery->description) }}" required>
                @error('description')
                <div style="color: red;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="category_id">Category:</label>
                <select name="category_id" required>
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $gallery->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                <div style="color: red;">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="button">Update Image</button>
            <a href="{{ route('gallery.index') }}" class="button cancel">Cancel</a>
        </form>
    </div>
@endsection
</body>
</html>