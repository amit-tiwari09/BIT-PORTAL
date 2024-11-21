

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $blog->title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300;400;700&family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #3498db;
            --text-color: #333;
            --bg-color: #f8f9fa;
            --content-bg: #ffffff;
        }

        body {
            font-family: 'Open Sans', sans-serif;
            line-height: 1.8;
            color: var(--text-color);
            background-color: var(--bg-color);
        }

        .blog-container {
            max-width: 800px;
            margin: 40px auto;
            background: var(--content-bg);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .blog-header {
            text-align: center;
            margin-bottom: 30px;
            padding-bottom: 30px;
            border-bottom: 2px solid #f0f0f0;
        }

        .blog-title {
            font-family: 'Merriweather', serif;
            font-size: 2.5rem;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 20px;
            word-wrap: break-word;
        }

        .blog-meta {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 15px;
            font-size: 0.95rem;
            color: #666;
        }

        .meta-item {
            display: flex;
            align-items: center;
            gap: 5px;
            padding: 5px 15px;
            background-color: #f8f9fa;
            border-radius: 20px;
        }

        .blog-image {
            width: 100%;
            max-height: 500px;
            object-fit: cover;
            border-radius: 12px;
            margin: 20px 0;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
        }

        .blog-content {
            font-family: 'Lora', 'Georgia', serif;
            /* Primary font for content */
            font-size: 1.1rem;
            line-height: 2;
            color: #2d3436;
            margin: 30px 0;
            padding: 30px;
            background-color: #fff;
            border-radius: 10px;
            letter-spacing: 0.3px;
            word-spacing: 1px;
        }

        /* Additional styles for different text elements within blog content */
        .blog-content p {
            margin-bottom: 1.8em;
            text-align: justify;
            font-weight: 400;
            hyphens: auto;
            word-wrap: break-word;
            overflow-wrap: break-word;
        }

        .blog-content h2 {
            font-family: 'Playfair Display', serif;
            font-size: 1.8rem;
            color: #2c3e50;
            margin: 1.5em 0 1em;
            font-weight: 700;
        }

        .blog-content h3 {
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
            color: #34495e;
            margin: 1.2em 0 0.8em;
            font-weight: 600;
        }

        .blog-content strong {
            font-weight: 600;
            color: #2c3e50;
        }

        .blog-content em {
            font-style: italic;
            color: #34495e;
        }

        .blog-content blockquote {
            font-family: 'Playfair Display', serif;
            font-size: 1.2rem;
            font-style: italic;
            border-left: 4px solid #3498db;
            padding-left: 20px;
            margin: 2em 0;
            color: #2c3e50;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .blog-content {
                font-size: 1rem;
                padding: 20px;
                line-height: 1.8;
            }

            .blog-content h2 {
                font-size: 1.5rem;
            }

            .blog-content h3 {
                font-size: 1.3rem;
            }
        }

        .back-btn {
            display: inline-block;
            padding: 12px 25px;
            background-color: var(--primary-color);
            color: white;
            text-decoration: none;
            border-radius: 25px;
            transition: all 0.3s ease;
            font-weight: 600;
            margin-top: 20px;
            box-shadow: 0 3px 10px rgba(52, 152, 219, 0.2);
        }

        .back-btn:hover {
            background-color: #2980b9;
            transform: translateY(-2px);
            color: white;
            box-shadow: 0 5px 15px rgba(52, 152, 219, 0.3);
        }

        .back-btn i {
            margin-right: 8px;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .blog-container {
                margin: 20px;
                padding: 20px;
            }

            .blog-title {
                font-size: 2rem;
            }

            .blog-meta {
                flex-direction: column;
                align-items: center;
            }

            .blog-content {
                font-size: 1rem;
            }
        }

        /* Reading Progress Bar */
        .progress-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: #f1f1f1;
            z-index: 1000;
        }

        .progress-bar {
            height: 4px;
            background: var(--primary-color);
            width: 0%;
            transition: width 0.3s ease;
        }
    </style>
</head>

<body>
    <!-- Reading Progress Bar -->
    <div class="progress-container">
        <div class="progress-bar" id="readingProgress"></div>
    </div>

    <div class="blog-container">
        <div class="blog-header">
            <h1 class="blog-title">{{ $blog->title }}</h1>
            <div class="blog-meta">
                <span class="meta-item">
                    <i class="fas fa-user"></i>
                    {{ $blog->Author }}
                </span>
                <span class="meta-item">
                    <i class="fas fa-folder"></i>
                    {{ $blog->category }}
                </span>
                <span class="meta-item">
                    <i class="fas fa-calendar"></i>
                    {{ $blog->created_at->format('F j, Y') }}
                </span>
            </div>
        </div>

        @if($blog->image_path)
        <div class="text-center">
            <img src="{{ asset($blog->image_path) }}" alt="{{ $blog->title }}" class="blog-image">
        </div>
        @endif

        <div class="blog-content">
            {!! nl2br(e($blog->body)) !!}
        </div>


        @if (!auth()->guard('staff')->check() && !auth()->guard('student')->check())
        <div class="text-center">
            <a href="{{ route('blog.index2') }}" class="back-btn">
                <i class="fas fa-arrow-left"></i> Back to Blog
            </a>
        </div>          
        @endif

        @if (auth()->guard('staff')->check() )
        <div class="text-center">
            <a href="{{ route('blog.index') }}" class="back-btn">
                <i class="fas fa-arrow-left"></i> Back to Blog
            </a>
        </div>          
        @endif

        @if(auth()->guard('student')->check())
        <div class="text-center">
            <a href="{{ route('blog.index3') }}" class="back-btn">
                <i class="fas fa-arrow-left"></i> Back to Blog
            </a>
        </div>  
        @endif

        
    </div>

    <script>
        // Reading Progress Bar
        window.onscroll = function() {
            let winScroll = document.body.scrollTop || document.documentElement.scrollTop;
            let height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            let scrolled = (winScroll / height) * 100;
            document.getElementById("readingProgress").style.width = scrolled + "%";
        };

        // Wrap paragraphs
        document.addEventListener('DOMContentLoaded', function() {
            const content = document.querySelector('.blog-content');
            content.innerHTML = content.innerHTML.split('\n').map(paragraph =>
                paragraph.trim() ? `<p>${paragraph}</p>` : ''
            ).join('');
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>