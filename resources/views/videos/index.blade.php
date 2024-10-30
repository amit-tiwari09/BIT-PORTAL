<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container">
    <h1>Latest Videos</h1>
    <div class="row">
        @foreach($videos as $video)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ $video->thumbnail_url }}" class="card-img-top" alt="{{ $video->title }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $video->title }}</h5>
                        <p class="card-text">{{ $video->description }}</p>
                        <a href="https://www.youtube.com/watch?v={{ $video->video_id }}" class="btn btn-primary" target="_blank">Watch Video</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
</body>
</html>