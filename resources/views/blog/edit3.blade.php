
@extends('backend.StudentDashboard.index')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title> <!-- Updated title to reflect editing -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Roboto', sans-serif;
        }

        .form-container {
            background-color: #ffffff;
            border-radius: 15px;
            padding: 40px;
            box-shadow: 0 0 30px rgba(0,0,0,0.1);
            margin-top: 50px;
            margin-bottom: 50px;
        }

        .page-title {
            color: #333;
            margin-bottom: 30px;
            text-align: center;
            font-weight: 700;
            font-size: 2.5rem;
        }

        .form-label {
            font-weight: 600;
            color: #495057;
            margin-bottom: 10px;
        }

        .form-control, .form-select {
            border-radius: 8px;
            border: 2px solid #ced4da;
            padding: 12px;
            margin-bottom: 20px;
            transition: all 0.3s ease;
        }

        .form-control:focus, .form-select:focus {
            border-color: #80bdff;
            box-shadow: 0 0 0 0.25rem rgba(13,110,253,.25);
        }

        .btn {
            padding: 12px 25px;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background-color: #0d6efd;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0b5ed7;
            transform: translateY(-2px);
        }

        .btn-secondary {
            background-color: #6c757d;
            border: none;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }

        .error {
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
            color: #721c24;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 25px;
        }

        .error ul {
            margin-bottom: 0;
            padding-left: 20px;
        }

        .file-upload {
            position: relative;
            overflow: hidden;
            margin-bottom: 20px;
        }

        .file-upload input[type=file] {
            position: absolute;
            top: 0;
            right: 0;
            min-width: 100%;
            min-height: 100%;
            font-size: 100px;
            text-align: right;
            filter: alpha(opacity=0);
            opacity: 0;
            outline: none;
            cursor: pointer;
            display: block;
        }

        .file-upload-btn {
            display: inline-block;
            padding: 12px 25px;
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .file-upload-btn:hover {
            background-color: #218838;
        }

        .file-upload-text {
            margin-left: 10px;
            font-style: italic;
        }

        #image-preview {
            max-width: 100%;
            margin-top: 10px;
            border-radius: 8px;
            display: none;
        }
    </style>
</head>
<body>
    @section('blogedit')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="form-container">

                <div class="d-flex justify-content-start mb-4">
                        <a href="{{ route('blog.index3') }}" class="btn btn-secondary">
                        <i class="fa-solid fa-arrow-left"></i> Back
                        </a>
                    </div>
                    
                    @if ($errors->any())
                    <div class="error">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <h1 class="page-title">Edit Post</h1> <!-- Updated heading to reflect editing -->

                    <form id="postForm" action="{{ route('blog.update3', $post->id) }}" method="POST" enctype="multipart/form-data"> <!-- Updated action to point to update route -->
                        @csrf
                       
                        
                        <div class="mb-4">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" value="{{ old('title', $post->title) }}" id="title" name="title" placeholder="Enter post title" required>
                        </div>

                        <div class="mb-4">
                            <label for="body" class="form-label">Content</label>
                            <textarea class="form-control" id="body" name="body" rows="10" placeholder="Write your content here..." required>{{ old('body', $post->body) }}</textarea>
                        </div>

                        <div class="mb-4" id="categoryDiv">
                            <label for="category" class="form-label">Category</label>
                            <div class="d-flex gap-2">
                                <select class="form-select" id="category" name="category" required>
                                    <option value="">--Select Category--</option>
                                    @foreach ($categories as $category)
                                    <option value="{{ $category }}" {{ $category == $post->category ? 'selected' : '' }}>{{ $category }}</option> <!-- Set selected category -->
                                    @endforeach
                                </select>
                                <button type="button" class="btn btn-secondary" onclick="addNewCategory()">
                                    <i class="fas fa-plus"></i> New
                                </button>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="image" class="form-label">Thumbnail Image</label>
                            <div class="file-upload">
                                <button type="button" class="file-upload-btn" onclick="document.getElementById('image').click()">
                                    <i class="fas fa-cloud-upload-alt"></i> Choose Image
                                </button>
                                <input type="file" class="form-control" id="image" name="image" accept="image/*" onchange="previewImage(this);">
                                <span class="file-upload-text" id="file-chosen">No file chosen</span>
                            </div>
                            <img id="image-preview" src="{{ asset($post->image_path) }}" alt="Image preview" style="display: {{ $post->image_path ? 'block' : 'none' }};"/> <!-- Display current image if exists -->
                        </div>

                        <div class="mb-4">
                            <label for="author" class="form-label">Your name</label>
                            <input type="text" class="form-control" id="author" value="{{ Auth::guard('staff')->check() ? Auth::guard('staff')->user()->name : (Auth::guard('student')->check() ? Auth::guard('student')->user()->name : '') }}" name="Author" placeholder="Enter your name" readonly required>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-paper-plane"></i> Update Post <!-- Updated button text -->
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
    <script>
        function addNewCategory() {
            document.getElementById('categoryDiv').innerHTML = `
                <label for="newCategory" class="form-label">New Category</label>
                <div class="d-flex gap-2">
                    <input type="text" class="form-control" id="newCategory" name="newCategory" placeholder="Enter category name">
                     <button type="button" class="btn btn-secondary" onclick="addCategory()">
                        <i class="fas fa-list"></i> Existing Categories
                    </button>
                </div>
            `;
        }

        function addCategory() {
            document.getElementById('categoryDiv').innerHTML = `
                <label for="category" class="form-label">Category</label>
                <div class="d-flex gap-2">
                    <select class="form-select" id="category" name="category" required>
                        <option value="">--Select Category--</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category }}">{{ $category }}</option>
                        @endforeach
                    </select>
                    <button type="button" class="btn btn-secondary" onclick="addNewCategory()">
                        <i class="fas fa-plus"></i> New
                    </button>
                </div>
            `;
        }

        function previewImage(input) {
            const file = input.files[0];
            const fileName = file ? file.name : 'No file chosen';
            document.getElementById('file-chosen').innerText = fileName;

            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    const imgPreview = document.getElementById('image-preview');
                    imgPreview.src = e.target.result;
                    imgPreview.style.display = 'block';
                }
                reader.readAsDataURL(file);
            }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
