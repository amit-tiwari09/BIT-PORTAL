@extends('backend.StudentDashboard.index')


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Listing Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8f9fa;
            padding: 20px;
        }


        .post-actions {
            display: flex;
            justify-content: space-between;
            margin-top: 15px;
            margin-bottom: 15px;
        }

        .edit-btn,
        .delete-btn {
            padding: 6px 12px;
            border-radius: 4px;
            font-size: 0.9rem;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .edit-btn {
            background-color: #ffc107;
            color: #212529;
        }

        .edit-btn:hover {
            background-color: #ffca2c;
            color: #212529;
        }

        .delete-btn {
            background-color: #dc3545;
            color: white;
            border: none;
            cursor: pointer;
        }

        .delete-btn:hover {
            background-color: #bb2d3b;
        }


        .post-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .post-category,
        .post-author {
            font-size: 0.9rem;
            color: #6c757d;
            padding: 5px 10px;
            background-color: #f8f9fa;
            border-radius: 15px;
            display: inline-block;
        }

        .post-author {
            margin-left: 10px;
        }


        .page-header {
            text-align: center;
            margin: 30px 0;
            color: #333;
            font-weight: 600;
        }

        .success-message {
            background-color: #d4edda;
            color: #155724;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
            text-align: center;
        }

        .create-post-btn {
            display: block;
            width: fit-content;
            margin: 0 auto 30px;
            padding: 12px 25px;
            background-color: #0d6efd;
            color: white;
            border-radius: 8px;
            text-decoration: none;
            transition: all 0.3s ease;
            border: none;
        }

        .create-post-btn:hover {
            background-color: #0b5ed7;
            transform: translateY(-2px);
            color: white;
        }

        .posts-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 25px;
            padding: 20px;
            max-width: 1400px;
            margin: 0 auto;
        }

        .post-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .post-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
        }

        .post-thumbnail {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
        }

        .no-image-placeholder {
            width: 100%;
            height: 200px;
            background-color: #e9ecef;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #6c757d;
            font-size: 0.9rem;
        }

        .post-content {
            padding: 20px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .post-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: #333;
            margin-bottom: 15px;
            word-wrap: break-word;
            line-height: 1.4;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-decoration: none;
        }

        .post-title:hover {
            color: #0d6efd;
        }

        .post-category {
            font-size: 0.9rem;
            color: #6c757d;
            margin-bottom: 15px;
            padding: 5px 10px;
            background-color: #f8f9fa;
            border-radius: 15px;
            display: inline-block;
        }

        .read-more-btn {
            padding: 8px 20px;
            background-color: #0d6efd;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            text-align: center;
            transition: background-color 0.3s ease;
            margin-top: auto;
            font-size: 0.9rem;
        }

        .read-more-btn:hover {
            background-color: #0b5ed7;
            color: white;
        }

        @media (max-width: 768px) {
            .posts-grid {
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
                padding: 10px;
            }

            .post-card {
                margin-bottom: 20px;
            }
        }

        @media (max-width: 480px) {
            .posts-grid {
                grid-template-columns: 1fr;
            }

            .post-thumbnail {
                height: 180px;
            }
        }
    </style>
</head>

<body>
@section('blog')

    @if (session('success'))
    <div class="success-message">
        {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif


    <h1 class="page-header">Blog Posts</h1>

    <a href="{{ route('blog.create3') }}" class="create-post-btn">
        <i class="fas fa-plus-circle"></i> Create New Post
    </a>

    <div class="posts-grid">
        @foreach($posts as $post)
        <div class="post-card">
            @if($post->image_path && file_exists(public_path($post->image_path)))
            <img src="{{ asset($post->image_path) }}" alt="Post thumbnail" class="post-thumbnail">
            @else
            <div class="no-image-placeholder">
                <i class="fas fa-image me-2"></i> No image available
            </div>
            @endif

            <div class="post-content">
                <a href="{{ route('blog.show', $post->id) }}" class="post-title">
                    {{ $post->title }}
                </a>

                <div class="post-meta">
                    <div class="post-category">
                        <i class="fas fa-tag me-1"></i> {{ $post->category }}
                    </div>
                    <div class="post-author">
                        <i class="fas fa-user me-1"></i> {{ $post->Author }}
                    </div>
                </div>

                <div class="post-actions">
                    <a href="{{ route('blog.edit3', $post->id) }}" class="edit-btn">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <form action="{{ route('blog.destroy3', $post->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-btn" onclick="return confirm('Are you sure you want to delete this post?');">
                            <i class="fas fa-trash-alt"></i> Delete
                        </button>
                    </form>
                </div>

                <a href="{{ route('blog.show', $post->id) }}" class="read-more-btn">
                    Read More <i class="fas fa-arrow-right ms-1"></i>
                </a>
            </div>
        </div>
        @endforeach
    </div>
   
@endsection
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    
</body>

</html>