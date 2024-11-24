<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Job Vacancy</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        label {
            display: block;
            margin: 10px 0 5px;
            color: #555;
        }
        input[type="text"], textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 15px;
            font-size: 16px;
        }
        button {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            margin-right: 10px;
        }
        button:hover {
            background-color: #218838;
        }
        .add-document {
            background-color: #007bff;
        }
        .add-document:hover {
            background-color: #0069d9;
        }

        /* Responsive Styles */
        @media (max-width: 600px) {
            .container {
                padding: 15px;
            }
            button {
                width: 100%;
                margin: 5px 0;
            }
        }
    </style>
</head>
<body>

@if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <div class="container">
        <h1>Create Job Vacancy</h1>

        <form action="{{ route('job-vacancies.store') }}" method="POST">
            @csrf
            <label for="title">Job Title</label>
            <input type="text" name="title" placeholder="Job Title" required>

            <label for="description">Description</label>
            <textarea name="description" placeholder="Job Description" required></textarea>

            <label for="required_documents">Required Documents</label>
            <div id="documents-container">
                <input type="text" name="required_documents[]" placeholder="Document 1 (e.g., Resume)" required>
            </div>
            
            <button type="button" class="add-document" onclick="addDocumentInput()">Add Another Document</button>
            <button type="submit">Create Job Vacancy</button>
        </form>
    </div>

    <script>
        function addDocumentInput() {
            const container = document.getElementById('documents-container');
            const input = document.createElement('input');
            input.type = 'text';
            input.name = 'required_documents[]';
            input.placeholder = 'Document (e.g., Transcript)';
            container.appendChild(input);
        }
    </script>
</body>
</html>