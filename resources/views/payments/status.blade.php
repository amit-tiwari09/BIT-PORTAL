<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <h2>Your Payment Status</h2>

        <table class="table">
            <thead>
                <tr>
                    <th>Semester</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach(range(1, 6) as $semester)
                <tr>
                    <td>Semester {{ $semester }}</td>
                    <td>
                        @if ($payments->where('semester', $semester)->count())
                        <span class="badge badge-success">Paid</span>
                        @else
                        <span class="badge badge-danger">Unpaid</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>