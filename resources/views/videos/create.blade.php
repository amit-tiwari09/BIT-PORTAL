<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Video</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #333;
        }

        input[type="text"],
        input[type="file"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        textarea {
            resize: vertical;
            height: 100px;
        }

        button {
            background: #3498db;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 15px;
            cursor: pointer;
            font-size: 16px;
            transition: background 0.3s;
            width: 100%;
        }

        button:hover {
            background: #2980b9;
        }

        .error-list {
            color: red;
            margin-bottom: 15px;
            list-style-type: none;
            padding: 0;
        }

        /* Preview section */
        .preview-section {
            margin-top: 20px;
            text-align: center;
        }

        .preview-section img {
            max-width: 100%;
            max-height: 300px;
            margin: 10px 0;
        }

        .preview-section video {
            width: 100%;
            max-width: 600px;
            height: auto;
            margin: 10px 0;
        }

        @media (max-width: 600px) {
            .container {
                padding: 15px;
            }

            button {
                padding: 10px;
                font-size: 14px;
            }
        }
    </style>
</head>

<body>
    <h1>Upload a Video</h1>

    <div class="container">
        <!-- Display errors if any -->
        @if ($errors->any())
            <ul class="error-list">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <!-- Video Upload Form -->
        <form action="{{ route('videos.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Title Input -->
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}" required>

            <!-- Description Textarea -->
            <label for="description">Description:</label>
            <textarea name="description" id="description" required>{{ old('description') }}</textarea>

            <!-- Category Input -->
            <label for="category">Category:</label>
            <input type="text" name="category" id="category" value="{{ old('category') }}">

            <!-- Author Input -->
            <label for="author">Author:</label>
            @php
                $authorName = null;
                if (Auth::guard('staff')->check()) {
                    $authorName = Auth::guard('staff')->user()->name;  // Get the staff name
                } elseif (Auth::guard('student')->check()) {
                    $authorName = Auth::guard('student')->user()->name;  // Get the student name
                }
            @endphp
            <input type="text" name="author" id="author" value="{{ old('author', $authorName) }}" readonly>

            <!-- Thumbnail Upload -->
            <label for="thumbnail">Thumbnail:</label>
            <input type="file" name="thumbnail" id="thumbnail" onchange="previewThumbnail(event)">

            <!-- Video Upload -->
            <label for="video">Video File:</label>
            <input type="file" name="video" accept="video/*" id="video" onchange="previewVideo(event)" required>

            <!-- Submit Button -->
            <button type="submit">Upload</button>
        </form>

        <!-- Preview Section -->
        <div class="preview-section" id="preview-section">
            <h3>Preview</h3>
            <!-- Thumbnail Preview -->
            <div id="thumbnail-preview" style="display: none;">
                <h4>Thumbnail:</h4>
                <img id="thumbnail-img" src="" alt="Thumbnail Preview">
            </div>

            <!-- Video Preview -->
            <div id="video-preview" style="display: none;">
                <h4>Video:</h4>
                <video id="video-player" controls>
                    <source id="video-source" src="" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
        </div>
    </div>

    <script>
        // Function to preview the thumbnail image
        function previewThumbnail(event) {
            var thumbnailPreview = document.getElementById('thumbnail-preview');
            var thumbnailImg = document.getElementById('thumbnail-img');
            var file = event.target.files[0];

            // Check if file is an image
            if (file && file.type.startsWith('image/')) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    thumbnailImg.src = e.target.result;
                    thumbnailPreview.style.display = 'block'; // Show the thumbnail preview
                };
                reader.readAsDataURL(file);
            } else {
                thumbnailPreview.style.display = 'none'; // Hide the thumbnail preview if the file isn't an image
            }
        }

        // Function to preview the video
        function previewVideo(event) {
            var videoPreview = document.getElementById('video-preview');
            var videoPlayer = document.getElementById('video-player');
            var file = event.target.files[0];

            // Check if file is a video
            if (file && file.type.startsWith('video/')) {
                var videoSource = document.getElementById('video-source');
                videoSource.src = URL.createObjectURL(file);
                videoPlayer.load(); // Reload the video with the new source
                videoPreview.style.display = 'block'; // Show the video preview
            } else {
                videoPreview.style.display = 'none'; // Hide the video preview if the file isn't a video
            }
        }
    </script>
</body>

</html>
