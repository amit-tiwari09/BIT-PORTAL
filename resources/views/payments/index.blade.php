<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Payments</h1>

    <table class="table">
        <thead>
            <tr>
                <th>Student</th>
                <th>Fee Structure</th>
                <th>Amount</th>
                <th>Payment Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($payments as $payment)
            <tr>
                <td>{{ $payment->student->name }}</td>
                <td>{{ $payment->feeStructure->department }}</td>
                <td>{{ $payment->amount }}</td>
                <td>{{ $payment->payment_date }}</td>
                <td>
                    <!-- Add edit and delete functionality as needed -->
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>