<!-- resources/views/social_media_links/index.blade.php -->
 @extends('setting.index')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Social Media Links</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }
        a {
            text-decoration: none;
            color: #007BFF;
        }
        a:hover {
            text-decoration: underline;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        ul {
            list-style: none;
            padding: 0;
        }
        li {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }
        li:last-child {
            border-bottom: none;
        }
        button {
            background-color: #dc3545;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 5px 10px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #c82333;
        }
        .add-link {
            text-align: right;
            margin-bottom: 20px;
        }
        img{
            height: 80px;
            width: 80px;
        }
    </style>
</head>
<body>
    @section('social')
    <div class="container">
        <h1>Social Media Links</h1>
        <div class="add-link">
            <a href="{{ route('social_media_links.create') }}" class="btn btn-primary">Add New Link <i class="fas fa-plus"></i></a>
        </div>
        <ul>
            @foreach($links as $link)
                <li>
                   <span><img src="{{asset('/pictures/' . $link->image)}}"></span>
                    <span>{{ $link->name }}</span>
                    <div>
                        <a href="{{ route('social_media_links.edit', $link->id) }}">Edit</a>
                        <form action="{{ route('social_media_links.destroy', $link->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>

    @endsection
</body>
</html>