
@extends('backend.StaffDashboard.index')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Images</title>
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

        .form-group div.error {
            color: red;
            font-size: 12px;
            margin-top: 5px;
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
            width: 100%;
        }

        .button:hover {
            background-color: #0056b3;
        }

        .preview-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(100px, 1fr));
            gap: 10px;
            margin-top: 20px;
        }

        .preview-item {
            border: 1px solid #ddd;
            border-radius: 4px;
            overflow: hidden;
            text-align: center;
            padding: 5px;
        }

        .preview-item img {
            width: 100%;
            height: auto;
        }

        @media (max-width: 600px) {
            .form-container {
                width: 90%;
            }

            .button {
                width: 100%;
            }
        }
    </style>
</head>

<body>
    @section('createsec')

    <h1>Upload Images</h1>

    <div class="form-container">
        <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="image">Upload Images:</label>
                <input type="file" name="images[]" accept="image/*" multiple required onchange="previewImages(this)">
                @error('images.*')
                <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <input type="text" name="description" value="{{ old('description') }}">
                @error('description') <div class="error">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label for="category_id">Category:</label>
                <select name="category_id" required>
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id') <div class="error">{{ $message }}</div> @enderror
            </div>

            <button type="submit" class="button">Upload Images</button>
        </form>
    </div>

    <div class="preview-grid" id="image-preview"></div>

    <script>
        function previewImages(input) {
            const previewContainer = document.getElementById('image-preview');
            previewContainer.innerHTML = ''; // Clear previous previews
            const files = input.files;

            for (let i = 0; i < files.length; i++) {
                const file = files[i];
                const reader = new FileReader();

                reader.onload = function(e) {
                    const imgElement = document.createElement('img');
                    imgElement.src = e.target.result;

                    const divElement = document.createElement('div');
                    divElement.classList.add('preview-item');
                    divElement.appendChild(imgElement);

                    previewContainer.appendChild(divElement);
                }

                reader.readAsDataURL(file);
            }
        }
    </script>
@endsection
</body>

</html>