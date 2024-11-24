<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interview Invitations</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>

<div class="container mt-5">
    <h1 class="text-center">All Interview Invitations</h1>

    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Table of Interview Invitations -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Student Name</th>
                <th>Job Title</th>
                <th>Interview Date</th>
                <th>Interview Time</th>
                <th>Interview Place</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($invitations as $invitation)
                <tr>
                    <td>{{ $invitation->id }}</td>
                    <td>{{ $invitation->application->student->name }}</td>
                    <td>{{ $invitation->application->jobVacancy->title }}</td>
                    <td>{{ \Carbon\Carbon::parse($invitation->interview_date)->format('d M, Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($invitation->interview_time)->format('h:i A') }}</td>
                    <td>{{ ucfirst($invitation->status) }}</td>
                    <td>
                        @if($invitation->status == 'pending')
                            <form action="{{ route('interviews.approve', $invitation->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-success">Approve</button>
                            </form>
                            <form action="{{ route('interviews.reject', $invitation->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-danger">Reject</button>
                            </form>
                        @else
                            <span class="text-muted">No action available</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>

<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
