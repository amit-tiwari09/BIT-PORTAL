<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Receipt</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
            text-align: center;
        }

        p {
            color: #555;
            line-height: 1.6;
        }

        .bill-details {
            margin: 20px 0;
            padding: 15px;
            background: #e9ecef;
            border-radius: 5px;
        }

        .bill-details ul {
            list-style-type: none;
            padding: 0;
        }

        .bill-details li {
            padding: 10px 0;
            display: flex;
            justify-content: space-between;
        }

        .bill-details li strong {
            color: #333;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            color: #777;
        }

        @media (max-width: 600px) {
            .container {
                padding: 10px;
            }

            h1 {
                font-size: 24px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Payment Receipt</h1>
        <p>Dear {{ $paymentDetails['student_name'] }},</p>

        <p>Thank you for your payment. Here are the details:</p>

        <div class="bill-details">
            <ul>
                <li><strong>Student ID:</strong> {{ $paymentDetails['student_id'] }}</li>
                <li><strong>Amount:</strong> NPR {{ $paymentDetails['amount'] }}</li>
                <li><strong>Semester:</strong> {{ $paymentDetails['semester'] }}</li>
                <li><strong>Payment Date:</strong> {{ $paymentDetails['payment_date'] }}</li>
            </ul>
        </div>

        <p class="footer">Best regards,<br>BIT</p>
    </div>
</body>

</html>