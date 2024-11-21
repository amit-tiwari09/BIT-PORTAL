<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Videos</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://kit.fontawesome.com/c9cb99f12f.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}"> <!-- CSRF Token -->
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

        .video-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            margin: 0 auto;
            max-width: 1200px;
        }

        .video {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: calc(25% - 20px);
            transition: transform 0.2s;
        }

        .video:hover {
            transform: scale(1.05);
        }

        .video img {
            width: 100%;
            height: auto;
            cursor: pointer;
        }

        .video-details {
            padding: 15px;
        }

        .video-details h3 {
            margin: 0 0 10px;
            font-size: 1.2em;
            color: #333;
        }

        .video-details p {
            margin: 5px 0;
            color: #666;
        }

        .video-actions {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }

        .video-actions button {
            background: #e74c3c;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 5px 10px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .video-actions button:hover {
            background: #c0392b;
        }

        .upload-button {
            display: inline-block;
            padding: 10px 15px;
            background: #3498db;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            font-size: 16px;
            transition: background 0.3s;
        }

        .upload-button:hover {
            background: #2980b9;
        }

        .upload-button i {
            margin-right: 5px;
        }

        /* Responsive Design */
        @media (max-width: 1200px) {
            .video {
                width: calc(33.33% - 20px);
            }
        }

        @media (max-width: 800px) {
            .video {
                width: calc(50% - 20px);
            }
        }

        @media (max-width: 500px) {
            .video {
                width: 100%;
            }
        }

        #no-results {
            text-align: center;
            color: #666;
        }
    </style>
</head>

<body>
    @if (session('error'))
    <div class="alert error">{{ session('error') }}</div>
    @endif

    <h1>Videos</h1>

    <!-- Search bar -->
    <form action="{{ route('videos.search') }}" method="GET" style="text-align: center; margin-bottom: 20px;">
        <input 
            type="text" 
            name="search" 
            placeholder="Search videos by title, description, or author" 
            value="{{ old('search', $query ?? '') }}" 
            style="padding: 10px; width: 80%; max-width: 400px; border-radius: 5px;"
        >
        <button type="submit" style="padding: 10px 20px; border-radius: 5px; background-color: #3498db; color: white; border: none; cursor: pointer;">
            Search
        </button>
    </form>

    <div class="video-container" id="video-container">
        @if (Auth::guard('staff')->check() || Auth::guard('student')->check())
        <div>
            <a href="{{ route('videos.create') }}" class="upload-button">
                <i class="fas fa-upload"></i> Upload
            </a>
        </div>
        @endif

        @foreach($videos as $video)
        <div class="video">
            <a href="{{ route('videos.show', $video->id) }}">
                <img src="{{ asset($video->thumbnail) }}" alt="Thumbnail">
            </a>
            <div class="video-details">
                <h3>{{ $video->title }}</h3>
                <p>{{ $video->description }}</p>
                <p>Author: {{ $video->author }}</p>

                <div class="video-actions">
                    @if (Auth::guard('staff')->check() || Auth::guard('student')->check())
                    <form action="{{ route('videos.destroy', $video->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                    <a href="{{ route('videos.edit', $video->id) }}">
                        <button>Edit</button>
                    </a>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <p id="no-results" style="display: none;">No videos found.</p>
    <a href="javascript:history.back()"><i class="fas fa-arrow-left"></i> Back</a>
    
</body>

</html>