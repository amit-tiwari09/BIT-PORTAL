<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interview Scheduled</title>
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
        h2 {
            color: #007bff;
            margin-bottom: 20px;
            text-align: center;
        }
        h3 {
            color: #333;
            margin: 10px 0;
        }
        p {
            line-height: 1.6;
            margin: 10px 0;
        }
        strong {
            color: #007bff;
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
            h2 {
                font-size: 1.5em; /* Adjust font size for smaller screens */
            }
            h3 {
                font-size: 1.2em; /* Adjust font size for smaller screens */
            }
            p {
                font-size: 0.9em; /* Adjust font size for smaller screens */
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Interview Scheduled</h2>
        <p>Dear {{ $application->student->name }},</p>

        <p>We are pleased to inform you that an interview has been scheduled for the following position:</p>

        <h3>Job Title: {{ $application->jobVacancy->title }}</h3>

        <p><strong>Interview Date:</strong> {{ \Carbon\Carbon::parse($interviewDetails['date'])->format('d M, Y') }}</p>
        <p><strong>Interview Time:</strong> {{ \Carbon\Carbon::parse($interviewDetails['time'])->format('h:i A') }}</p>
        <p><strong>Interview Place:</strong> {{ $interviewDetails['place'] }}</p>

        <p>Please let us know if you have any questions or need further clarification. We look forward to meeting you!</p>

        <footer>
            <p>Best regards,</p>
            <p>BiT</p>
        </footer>
    </div>
</body>
</html>