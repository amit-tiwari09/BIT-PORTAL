<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Applicant Details</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        /* Custom styles */
        body {
            background-color: #f8f9fa;
        }

        .container {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        .student-image {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            display: block;
            margin: 10px auto;
            border: 2px solid #007bff;
        }

        .placeholder {
            display: block;
            width: 150px;
            height: 150px;
            border-radius: 50%;
            background-color: #ddd;
            background-image: url('{{ asset('images/no-image.png') }}');
            background-size: cover;
            background-position: center;
            margin: 10px auto;
        }

        .details {
            margin: 20px 0;
            text-align: left;
        }

        .images {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .images img {
            max-width: 100%;
            height: auto;
            margin: 10px;
            width: 150px;
            cursor: pointer;
        }

        /* Lightbox styles */
        .lightbox {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            justify-content: center;
            align-items: center;
            z-index: 1050;
        }

        .lightbox img {
            max-width: 90%;
            max-height: 90%;
        }

        .lightbox .close,
        .lightbox .prev,
        .lightbox .next {
            position: absolute;
            background: rgba(255, 255, 255, 0.7);
            color: #333;
            border: none;
            padding: 10px;
            cursor: pointer;
            font-size: 18px;
        }

        .lightbox .close {
            top: 10px;
            right: 10px;
        }

        .lightbox .prev {
            top: 50%;
            left: 10px;
            transform: translateY(-50%);
        }

        .lightbox .next {
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="text-center">Applicant Details</h1>

        <a href="{{ route('job-applications.index') }}" class="btn btn-secondary mb-3">Back</a>

        <h2 class="text-center">{{ $application->student->name }}</h2>

        <!-- Student Image -->
        @if ($application->student->image)
        <img src="{{ asset('pictures/' . $application->student->image) }}" alt="Student Image" class="student-image">
        @else
        <div class="placeholder" title="No Image Available"></div>
        @endif

        <div class="details">
            <p><strong>Email:</strong> {{ $application->student->email }}</p>
            <p><strong>Status:</strong> {{ $application->status }}</p>
            <p><strong>Phone Number:</strong> {{ $application->student->phone_number }}</p>
            <p><strong>Job Applied For:</strong> {{ $application->jobVacancy->title }}</p>
            <p><strong>Application Date:</strong> {{ $application->created_at->format('d M, Y') }}</p>
        </div>

        <h2 class="text-center">Submitted Documents</h2>
        <div class="images">
            @foreach(json_decode($application->documents, true) as $index => $document)
            <img src="{{ asset('pictures/' . $document) }}" alt="Document {{ $index + 1 }}" class="img-thumbnail mb-3" data-index="{{ $index }}">
            @endforeach
        </div>

        <!-- Lightbox -->
        <div class="lightbox" id="lightbox">
            <button class="close" id="lightboxClose">&times;</button>
            <button class="prev" id="lightboxPrev">&lt;</button>
            <button class="next" id="lightboxNext">&gt;</button>
            <img id="lightboxImage" src="" alt="Lightbox Image">
        </div>

        <!-- Schedule Button -->
        <div class="text-center my-4">
            @if ($application->status !== 'interviewing' && $application->status !== 'rejected')
            <button class="btn btn-primary" data-toggle="modal" data-target="#scheduleModal">Schedule Interview</button>
            @else
            <button class="btn btn-secondary" disabled>{{$application->status}}</button>
            @endif
        </div>

        <!-- Modal -->
        <div class="modal fade" id="scheduleModal" tabindex="-1" role="dialog" aria-labelledby="scheduleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="scheduleModalLabel">Schedule Interview</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="scheduleForm" method="POST" action="{{ route('schedule.store', $application->id) }}">
                            @csrf
                            <div class="form-group">
                                <label for="date">Interview Date:</label>
                                <input type="date" id="date" name="date" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="time">Interview Time:</label>
                                <input type="time" id="time" name="time" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="place">Interview Place:</label>
                                <input type="text" id="place" name="place" class="form-control" required>
                            </div>

                            <button type="submit" class="btn btn-success">Confirm Schedule</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script>
        const lightbox = document.getElementById('lightbox');
        const lightboxImage = document.getElementById('lightboxImage');
        const images = document.querySelectorAll('.images img');
        const closeBtn = document.getElementById('lightboxClose');
        const prevBtn = document.getElementById('lightboxPrev');
        const nextBtn = document.getElementById('lightboxNext');
        let currentIndex = 0;

        function showLightbox(index) {
            currentIndex = index;
            lightboxImage.src = images[currentIndex].src;
            lightbox.style.display = 'flex';
        }

        function closeLightbox() {
            lightbox.style.display = 'none';
        }

        function navigateLightbox(direction) {
            currentIndex += direction;
            if (currentIndex < 0) {
                currentIndex = images.length - 1;
            } else if (currentIndex >= images.length) {
                currentIndex = 0;
            }
            lightboxImage.src = images[currentIndex].src;
        }

        images.forEach((img, index) => {
            img.addEventListener('click', () => showLightbox(index));
        });

        closeBtn.addEventListener('click', closeLightbox);
        prevBtn.addEventListener('click', () => navigateLightbox(-1));
        nextBtn.addEventListener('click', () => navigateLightbox(1));

        lightbox.addEventListener('click', (e) => {
            if (e.target === lightbox) {
                closeLightbox();
            }
        });
    </script>
</body>

</html>
