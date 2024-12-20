<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Approved</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
            color: #333;
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
            color: #28a745; /* Green color for success */
            text-align: center;
            margin-bottom: 20px;
        }
        p {
            line-height: 1.6;
            margin: 10px 0;
        }
        strong {
            color: #333;
        }
        footer {
            margin-top: 20px;
            text-align: center;
            font-size: 14px;
            color: #777;
        }

        /* Responsive Styles */
        @media (max-width: 600px) {
            .container {
                padding: 15px;
            }
            h1 {
                font-size: 1.5em; /* Adjust font size for smaller screens */
            }
            p {
                font-size: 0.9em; /* Adjust font size for smaller screens */
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Congratulations!</h1>
        <p>Your application has been approved.</p>
        <p><strong>Email:</strong> {{ $email }}</p>
        <p><strong>Password:</strong> {{ $password }}</p>
        <p>Thank you for your patience.</p>

        <footer>
            <p>Best regards,</p>
            <p>The Team</p>
        </footer>
    </div>
</body>
</html>