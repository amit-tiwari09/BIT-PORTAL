<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOMl0bP3F7j6z5T4Q6+G7/8g6t5j4v9Q0K1T7y" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/c9cb99f12f.js" crossorigin="anonymous"></script>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f9f9f9;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .button,
        .upload-link,
        .my-media-link,
        .back-button {
            display: inline-flex;
            align-items: center;
            text-decoration: none;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 18px;
            font-weight: bold;
            transition: background-color 0.3s;
            margin-bottom: 20px;
        }

        .upload-link {
            background-color: #4CAF50;
        }

        .upload-link:hover {
            background-color: #45a049;
        }

        .my-media-link {
            background-color: #FF9800;
            margin-left: 10px;
        }

        .my-media-link:hover {
            background-color: #fb8c00;
        }

        .back-button {
            background-color: #2196F3;
            margin-top: 20px;
        }

        .back-button:hover {
            background-color: #1976D2;
        }

        .category-buttons {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            margin-bottom: 20px;
        }

        .category-button {
            background-color: #007BFF;
            color: white;
            border: none;
            padding: 8px 12px;
            border-radius: 4px;
            cursor: pointer;
            margin: 5px;
            font-size: 14px;
            transition: background-color 0.3s;
        }

        .category-button:hover {
            background-color: #0056b3;
        }

        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 15px;
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
        }

        .gallery-item {
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center;
            background-color: #fff;
            transition: transform 0.3s, box-shadow 0.3s;
            padding: 5px;
        }

        .upload-date {
            font-size: 14px;
            color: #555;
            margin: 5px 0;
            font-style: italic;
            background-color: #f0f0f0;
            padding: 5px;
            border-radius: 4px;
            display: inline-block;
        }

        .gallery-item:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .gallery-item img {
            width: 100%;
            height: auto;
            border-bottom: 1px solid #ddd;
        }

        .gallery-item p {
            margin: 5px 0;
            font-size: 12px;
            color: #555;
        }

        .button {
            background-color: #007;
            color: white;
            border: none;
            padding: 6px 10px;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            margin: 5px 0;
            transition: background-color 0.3s;
            font-size: 12px;
        }

        .button:hover {
            background-color: #0056b3;
        }

        .button.delete {
            background-color: #dc3545;
        }

        .alert.error {
            background-color: #f8d7da;
            color: #721c24;
        }

        .button.delete:hover {
            background-color: #c82333;
        }

        /* Lightbox Styles */
        /* Lightbox Styles */
        .lightbox {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.9);
            /* Dark background */
            justify-content: center;
            align-items: center;
            z-index: 1000;
            transition: opacity 0.3s ease;
        }

        .lightbox-content {
            position: relative;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            max-width: 90%;
            /* Limit width to 90% of viewport */
            max-height: 90%;
            /* Limit height to 90% of viewport */
            overflow: hidden;
            /* Hide overflow */
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.5);
            animation: fadeIn 0.5s;
            /* Animation for opening */
        }

        .lightbox-content img {
            width: 100%;
            /* Make image take full width of lightbox */
            height: auto;
            /* Maintain aspect ratio */
            max-height: 70vh;
            /* Limit height to 70% of viewport height */
            object-fit: contain;
            /* Ensure the image fits within the bounds */
            display: block;
            /* Ensure no extra space below image */
            border-radius: 10px;
        }

        .lightbox-details {
            text-align: left;
            margin-top: 10px;
            /* Space between image and details */
        }

        .lightbox-close {
            /* position: absolute;
    top: 10px;
    right: 20px; */
            font-size: 28px;
            cursor: pointer;
            color: white;
            transition: color 0.3s;
        }

        .lightbox-close:hover {
            color: #ff4757;
            /* Change color on hover */
        }

        .lightboxbtn {
            display: flex;
            /* Use flexbox to align items */
            justify-content: flex-end;
            /* Space between the buttons */
            align-items: center;
            gap: 9px;
            /* Center items vertically */
            width: 100%;
            /* Full width of the lightbox */
            position: absolute;
            /* Positioning for better placement */
            top: 15px;
            right: 10px;
            /* Distance from the top */
            padding: 0 20px;
            /* Horizontal padding */
            z-index: 10;
            /* Ensure it is above other content */
        }




        .download-button {
            display: inline-flex;

            align-items: center;
            /* Center icon and text */
            font-size: 17px;
            /* Font size for button */
            /* padding: 5px 10px; */
            /* Padding for button */
            /* background-color: #4CAF50; */
            /* Button color */
            color: whitesmoke;
            /* Text color */
            border: none;
            /* No border */
            border-radius: 5px;
            /* Rounded corners */
            text-decoration: none;
            /* Remove underline */
            transition: background-color 0.3s;
            /* Smooth background transition */
        }



        .download-button:hover {
            color: #45a049;
            /* Darker green on hover */
        }

        /* Keyframe for fade-in animation */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        /* Responsive adjustments */
        @media (max-width: 600px) {
            .lightboxbtn {
                padding: 0 15px;
                /* Reduce padding on smaller screens */
            }

            .lightbox-content {
                padding: 15px;
                /* Reduce padding on smaller screens */
            }

            .lightbox-close {
                z-index: 9;
                color: red;
                font-size: 24px;
                /* Smaller close button */
            }

            .download-button {
                font-size: 16px;
                /* Smaller font size */
                /* padding: 8px 16px; */
                /* Smaller button padding */
            }

            .lightbox-details {
                font-size: 14px;
                /* Adjust font size for details */
            }
        }

        @media (max-width: 400px) {
            .lightboxbtn {
                top: 4px;
            }

            .lightbox-close {
                font-size: 20px;
                z-index: 9;
                color: red;
                /* Further reduce close button size */
            }

            .download-button {
                font-size: 14px;
                z-index: 9;
                /* Further reduce font size */
                /* padding: 6px 12px; */
                /* Further reduce button padding */
            }

            .lightbox-details {
                font-size: 12px;
                /* Further adjust font size */
            }
        }

        /* Responsive adjustments */
        @media (max-width: 1200px) {
            .gallery-grid {
                grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
            }
        }

        @media (max-width: 900px) {
            .gallery-grid {
                grid-template-columns: repeat(auto-fill, minmax(140px, 1fr));
            }
        }

        @media (max-width: 600px) {
            .gallery-grid {
                grid-template-columns: repeat(auto-fill, minmax(100px, 1fr));
            }

            .lightbox-content {
                padding: 15px;
            }

            .lightbox-close {
                font-size: 24px;
                color: red;
                /* background-color: #007; */
                z-index: 9;
            }

            .download-button {
                padding: 8px 16px;
            }
        }

        @media (max-width: 400px) {
            .gallery-grid {
                grid-template-columns: repeat(auto-fill, minmax(80px, 1fr));
            }
        }
    </style>
</head>

<body>



    @if (session('error'))
    <div class="alert error">{{ session('error') }}</div>
    @endif
    <h1>Image Gallery</h1>


    <!-- Category Buttons Section -->
    <div class="category-buttons">
        <button class="category-button" onclick="filterGallery('')">All Categories</button>
        @foreach($categories as $category)
        <button class="category-button" onclick="filterGallery('{{ $category->id }}')">{{ $category->name }}</button>
        @endforeach
    </div>



    <div class="gallery-grid" id="gallery">
        @foreach($galleries as $image)
        <div class="gallery-item" data-category-id="{{ $image->category_id }}">
            <span onclick="openLightbox('{{ asset($image->image_path) }}', '{{ $image->description }}', '{{ $image->category ? $image->category->name : 'Uncategorized' }}', '{{ $image->uploader_name ?: 'Unknown' }}', '{{ $image->created_at->format('Y-m-d H:i') }}')">
                <img src="{{ asset($image->image_path) }}" alt="Image">
                <p><strong>Description:</strong> {{ $image->description }}</p>
                <p><strong>Category:</strong> {{ $image->category ? $image->category->name : 'Uncategorized' }}</p>
                <p><strong>Uploaded By:</strong> {{ $image->uploader_name ?: 'Unknown' }}</p>
                <p class="upload-date"><strong>Uploaded On:</strong> {{ $image->created_at->format('Y-m-d H:i') }}</p>
            </span>
           

        </div>



        @endforeach
    </div>



    <!-- Lightbox Modal -->
    <div id="lightbox" class="lightbox">

        <div class="lightboxbtn">
            <span class="lightbox-close" onclick="closeLightbox()">&times;</span>
            <span>
                <a id="download-link" href="" download class="download-button">
                    <i class="fa-solid fa-download"></i>
                </a>
            </span>
        </div>

        <div class="lightbox-content">
            <img id="lightbox-image" src="" alt="Selected Image">
            <div class="lightbox-details">
                <p><strong>Description:</strong> <span id="lightbox-description"></span></p>
                <p><strong>Category:</strong> <span id="lightbox-category"></span></p>
                <p><strong>Uploaded By:</strong> <span id="lightbox-uploader"></span></p>
                <p><strong>Uploaded On:</strong> <span id="lightbox-date"></span></p>

            </div>
        </div>
    </div>




    <script>
        function filterGallery(categoryId) {
            const galleryItems = document.querySelectorAll('.gallery-item');

            galleryItems.forEach(item => {
                if (categoryId === '' || item.dataset.categoryId === categoryId) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        }

        function openLightbox(imagePath, description, category, uploader, date) {
            document.getElementById('lightbox-image').src = imagePath;
            document.getElementById('lightbox-description').textContent = description;
            document.getElementById('lightbox-category').textContent = category;
            document.getElementById('lightbox-uploader').textContent = uploader;
            document.getElementById('lightbox-date').textContent = date;
            document.getElementById('download-link').href = imagePath;
            document.getElementById('lightbox').style.display = 'flex';
        }

        function closeLightbox() {
            document.getElementById('lightbox').style.display = 'none';
        }
    </script>


</body>

</html>