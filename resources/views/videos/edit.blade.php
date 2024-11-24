@if (Auth::guard('staff')->check() || Auth::guard('student')->check())
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Video</title>
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

        .thumbnail-preview,
        .video-preview {
            margin: 10px 0;
        }

        video {
            width: 40%;
            height: auto;
            max-width: 100%;
        }

        @media (max-width: 600px) {
            .container {
                padding: 15px;
            }

            button {
                padding: 10px;
                font-size: 14px;
            }

            video {
                width: 100%;
            }
        }

        /* Loader Styles */
        #loader {
            display: none; /* Hidden by default */
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.8);
            z-index: 9999;
            justify-content: center;
            align-items: center;
        }

        #loader img {
            width: 50px; /* Loader size */
        }
    </style>
</head>

<body>
    <h1>Edit Video</h1>
    <a href="javascript:history.back()"><i class="fas fa-arrow-left"></i> Back</a>

    <div class="container">
        <!-- Display errors if any -->
        @if ($errors->any())
            <ul class="error-list">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form id="edit-video-form" action="{{ route('videos.update', $video->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') <!-- This tells Laravel it's an update -->

            <label for="title">Title:</label>
            <input type="text" name="title" value="{{ old('title', $video->title) }}" required>

            <label for="description">Description:</label>
            <textarea name="description" required>{{ old('description', $video->description) }}</textarea>

            <label for="category">Category:</label>
            <input type="text" name="category" value="{{ old('category', $video->category) }}">

            <label for="author">Author:</label>
            <input type="text" name="author" value="{{ old('author ', $video->author) }}" required>

            <!-- Thumbnail Upload -->
            <label for="thumbnail">Thumbnail (optional):</label>
            <input type="file" name="thumbnail">
            @if ($video->thumbnail && !old('thumbnail'))
                <!-- Display existing thumbnail -->
                <div class="thumbnail-preview">
                    <img src="{{ asset($video->thumbnail) }}" alt="Thumbnail" width="100"><br>
                    <small>Current Thumbnail</small>
                </div>
            @elseif (old('thumbnail'))
                <!-- Display new thumbnail preview after upload -->
                <div class="thumbnail-preview">
                    <img src="{{ asset('pictures/' . old('thumbnail')) }}" alt="Thumbnail Preview" width="100"><br>
                    <small>New Thumbnail</small>
                </div>
            @endif

            <!-- Video Upload -->
            <label for="video">Video File (optional):</label>
            <input type="file" name="video">
            @if ($video->file_path && !old('video'))
                <!-- Display existing video -->
                <div class="video-preview">
                    <video controls>
                        <source src="{{ asset($video->file_path) }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video><br>
                    <small>Current Video</small>
                </div>
            @elseif (old('video'))
                <!-- Display new video preview after upload -->
                <div class="video-preview">
                    <video controls>
                        <source src="{{ asset('pictures/' . old('video')) }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video><br>
                    <small>New Video</small>
                </div>
            @endif

            <button type="submit">Update Video</button>
        </form>
    </div>

    <!-- Loader Element -->
    <div id="loader">
    <img src="{{ asset('utilities/loader.gif') }}" alt="Loading...">
</div>


    <script>
        document.getElementById('edit-video-form').addEventListener('submit', function() {
            document.getElementById('loader').style.display = 'flex'; // Show loader
        });
    </script>
</body>

</html>

@endif