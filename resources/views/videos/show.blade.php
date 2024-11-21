<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $video->title }}</title>
    <!-- Include Plyr.js CSS -->
    <link rel="stylesheet" href="https://cdn.plyr.io/3.7.2/plyr.css">
    <!-- Include Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://kit.fontawesome.com/c9cb99f12f.js" crossorigin="anonymous"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
            display: flex;
            flex-direction: row; /* Layout videos side by side */
        }

        .video-container {
            flex: 0 0 60%; /* Left side for the main video */
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin-right: 20px; /* Add space between columns */
            position: relative; /* For positioning the restart button */
        }

        video {
            width: 100%;
            max-height: 50vh; /* Limit height to 50% of the viewport height */
            height: auto; /* Maintain aspect ratio */
        }

        .info-container {
            margin-top: 20px;
            text-align: left;
        }

        .info-container p {
            margin: 5px 0;
        }

        .sidebar {
            flex: 0 0 35%; /* Right side for the remaining videos */
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            height: auto; /* Adjust height */
            overflow-y: auto;
        }

        .video-thumbnail {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .video-thumbnail:hover {
            background: #f0f0f0; /* Highlight on hover */
            border-radius: 5px;
        }

        .video-thumbnail img {
            width: 50px;
            height: 50px;
            margin-right: 10px;
            border-radius: 5px;
        }

        .video-thumbnail p {
            margin: 0;
            font-weight: bold;
        }

        a {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            color: #3498db;
        }

        a:hover {
            text-decoration: underline;
        }

        .restart-button {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 10px 20px;
            background-color: rgba(52, 152, 219, 0.8);
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            display: none; /* Hidden by default */
            z-index: 10; /* Ensure it's above other elements */
        }

        .restart-button i {
            margin-right: 5px;
        }

        @media (max-width: 768px) {
            body {
                flex-direction: column;
            }

            .video-container {
                width: 100%;
                margin-right: 0;
            }

            .sidebar {
                width: 100%;
                margin-top: 20px;
            }
        }
    </style>
</head>

<body>
    <div class="video-container">
        <!-- Video Player -->
        <h1><i class="fas fa-video"></i> {{ $video->title }}</h1>
        <video id="plyrPlayer" controls>
            <source src="{{ asset($video->file_path) }}" type="video/mp4">
            <track src="{{ asset('subtitles/example.vtt') }}" kind="subtitles" srclang="en" label="English">
        </video>
        <button class="restart-button" id="restartButton"><i class="fas fa-redo"></i> Restart Video</button>

        <div class="info-container">
            <p><i class="fas fa-user "></i> <strong>Author :</strong> {{ $video->author }}</p>
            <p><i class="fas fa-folder"></i> <strong>Category:</strong> {{ $video->category }}</p>
            <p><i class="fas fa-info-circle"></i> <strong>Description:</strong> {{ $video->description }}</p>
        </div>

        <a href="javascript:history.back()"><i class="fas fa-arrow-left"></i> Back</a>

    </div>

    <div class="sidebar">
        <h2><i class="fas fa-th-list"></i> Related Videos</h2>
        <div class="video-list">
            @foreach ($otherVideos as $otherVideo)
            <div class="video-thumbnail" onclick="window.location.href='{{ route('videos.show', $otherVideo->id) }}'">
                <img src="{{ asset($otherVideo->thumbnail) }}" alt="Thumbnail">
                <p><i class="fas fa-play-circle"></i> {{ $otherVideo->title }}</p>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Include Plyr.js JavaScript -->
    <script src="https://cdn.plyr.io/3.7.2/plyr.js"></script>
    <script>
        const player = new Plyr('#plyrPlayer', {
            controls: [
                'play', 'progress', 'current-time', 'duration',
                'mute', 'volume', 'settings', 'fullscreen'
            ],
            settings: ['captions', 'quality', 'speed'],
            speed: { selected: 1, options: [0.5, 1, 1.5, 2] }, // Playback speed options
            quality: { default: 720, options: [360, 480, 720, 1080] }, // Video quality options
        });

        // Event listener for fullscreen change
        player.on('enterfullscreen', function () {
            document.querySelector('video').style.maxHeight = '100vh'; // Set height to 100% when in fullscreen
        });

        player.on('exitfullscreen', function () {
            document.querySelector('video').style.maxHeight = '50vh'; // Reset height to 50% when exiting fullscreen
        });

        // Event listener for video end
        player.on('ended', function () {
            player.pause(); // Stop the video
            document.querySelector('.restart-button').style.display = 'block'; // Show restart button
        });

        // Restart video when button is clicked
        document.getElementById('restartButton').addEventListener('click', function () {
            player.restart(); // Restart the video
            this.style.display = 'none'; // Hide the restart button
        });

        // Ensure the restart button is visible in fullscreen
        player.on('enterfullscreen', function () {
            document.querySelector('.restart-button').style.display = 'block'; // Show restart button in fullscreen
        });

        player.on('exitfullscreen', function () {
            if (player.ended) {
                document.querySelector('.restart-button').style.display = 'block'; // Show restart button if video ended
            } else {
                document.querySelector('.restart-button').style.display = 'none'; // Hide restart button if video is still playing
            }
        });
    </script>
</body>

</html>