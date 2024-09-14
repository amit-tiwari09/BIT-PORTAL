<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<div>
    <p>Name: {{ $applicant->name }}</p>
    <p>Email: {{ $applicant->email }}</p>
    <p>address:{{$applicant->address}}</p>
    <!-- Display other fields like gender, department, etc. -->

    <!-- Display images -->
    <canvas id="imageCanvas"></canvas>

    <script>
        let canvas = document.getElementById('imageCanvas');
        let ctx = canvas.getContext('2d');
        
        // Load images
        let img = new Image();
        img.src = '{{ asset("pictures/".$applicant->certificate_path) }}'; // Example image
        img.onload = function() {
            ctx.drawImage(img, 10, 10, 200, 200); // Adjust as needed
        };
    </script>
</div>

</body>
</html>