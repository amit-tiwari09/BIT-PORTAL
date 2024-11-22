@if (Auth::guard('staff')->check() || Auth::guard('student')->check())

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

        /* Loader Styles */
        .progress-container {
            margin: 20px 0;
        }

        .progress-bar {
            width: 0%;
            height: 20px;
            background-color: #3498db;
            border-radius: 5px;
            transition: width 0.4s;
        }

        .progress-text {
            margin-top: 10px;
            font-size: 14px;
            color: #333;
        }
    </style>
</head>

<body>
    <h1>Upload a Video</h1>

    <div class="container">
        @if ($errors->any())
            <ul class="error-list">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <a href="javascript:history.back()"><i class="fas fa-arrow-left"></i> Back</a>

        <form action="{{ route('videos.store') }}" method="POST" enctype="multipart/form-data" id="video-upload-form">
            @csrf
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}" required>

            <label for="description">Description:</label>
            <textarea name="description" id="description" required>{{ old('description') }}</textarea>

            <label for="category">Category:</label>
            <input type="text" name="category" id="category" value="{{ old('category') }}">

            <label for="author">Author:</label>
            @php
                $authorName = null;
                if (Auth::guard('staff')->check()) {
                    $authorName = Auth::guard('staff')->user()->name;
                } elseif (Auth::guard('student')->check()) {
                    $authorName = Auth::guard('student')->user()->name;
                }
            @endphp
            <input type="text" name="author" id="author" value="{{ old('author', $authorName) }}" readonly>

            <label for="thumbnail">Thumbnail:</label>
            <input type="file" name="thumbnail" id="thumbnail" onchange="previewThumbnail(event)">

            <label for="video">Video File:</label>
            <input type="file" name="video" accept="video/*" id="video" onchange="previewVideo(event)" required>

            <button type="submit" id="upload-btn">Upload</button>
        </form>

        <div class="progress-container" id="progress-container" style="display: none;">
            <div class="progress-bar" id="progress-bar"></div>
            <div class="progress-text" id="progress-text">Uploading... 0%</div>
        </div>

        <div class="preview-section" id="preview-section">
            <h3>Preview</h3>
            <div id="thumbnail-preview" style="display: none;">
                <h4>Thumbnail:</h4>
                <img id="thumbnail-img" src="" alt="Thumbnail Preview">
            </div>
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
    function previewThumbnail(event) {
        const thumbnailPreview = document.getElementById('thumbnail-preview');
        const thumbnailImg = document.getElementById('thumbnail-img');
        const file = event.target.files[0];

        if (file && file.type.startsWith('image/')) {
            const reader = new FileReader();
            reader.onload = function (e) {
                thumbnailImg.src = e.target.result;
                thumbnailPreview.style.display = 'block';
            };
            reader.readAsDataURL(file);
        } else {
            thumbnailPreview.style.display = 'none';
        }
    }

    function previewVideo(event) {
        const videoPreview = document.getElementById('video-preview');
        const videoPlayer = document.getElementById('video-player');
        const file = event.target.files[0];

        if (file && file.type.startsWith('video/')) {
            const videoSource = document.getElementById('video-source');
            videoSource.src = URL.createObjectURL(file);
            videoPlayer.load();
            videoPreview.style.display = 'block';
        } else {
            videoPreview.style.display = 'none';
        }
    }

    const form = document.getElementById('video-upload-form');
    const progressBar = document.getElementById('progress-bar');
    const progressContainer = document.getElementById('progress-container');
    const progressText = document.getElementById('progress-text');
    const uploadButton = document.getElementById('upload-btn');

    form.addEventListener('submit', function (event) {
        event.preventDefault(); // Prevent the default form submission

        const formData = new FormData(form);
        const xhr = new XMLHttpRequest();
        xhr.open('POST', form.action, true);

        progressContainer.style.display = 'block';
        uploadButton.disabled = true;

        xhr.upload.addEventListener('progress', function (e) {
            if (e.lengthComputable) {
                const percentComplete = Math.round((e.loaded / e.total) * 100);
                progressBar.style.width = percentComplete + '%';
                progressText.textContent = `Uploading... ${percentComplete}%`;
            }
        });

        xhr.addEventListener('load', function () {
            if (xhr.status === 200) {
                progressText.textContent = 'Upload Complete!';
                uploadButton.disabled = false;

                // Optionally reset the form after upload
                form.reset();
                progressBar.style.width = '0%';

                // Redirect or show a success message
                alert('Video uploaded successfully!');
            } else {
                progressText.textContent = 'Upload failed. Please try again.';
                uploadButton.disabled = false;
            }
        });

        xhr.addEventListener('error', function () {
            progressText.textContent = 'An error occurred during the upload.';
            uploadButton.disabled = false;
        });

        xhr.send(formData);
    });
</script>

</body>

</html>

@endif
