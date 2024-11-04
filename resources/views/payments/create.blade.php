<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pay Fees for Semester {{ $semester }}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="container mt-5">
    <h2>Pay Fees for Semester {{ $semester }}</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @elseif(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if($feeStructure)
        <form action="{{ route('payments.store') }}" method="POST" id="payment-form">
            @csrf

            <input type="hidden" name="student_id" value="{{ Auth::guard('student')->user()->id }}">
            <input type="hidden" name="fee_structure_id" value="{{ $feeStructure->id }}">
            <input type="hidden" name="semester" value="{{ $semester }}">

            <div class="form-group">
                <label for="amount">Amount</label>
                <input type="text" id="amount" name="amount" value="{{ $feeStructure->{'semester'.$semester.'_fee'} }}" readonly class="form-control">
            </div>

            <div class="form-group">
                <label for="card-element">Credit or debit card</label>
                <div id="card-element" class="form-control"></div>
                <div id="card-errors" role="alert" class="text-danger mt-2"></div>
            </div>

            <button type="submit" class="btn btn-primary">Pay</button>
        </form>
    @else
        <div class="alert alert-warning">
            <strong>Note:</strong> Fee structure for this semester is not available. Please contact the administration.
        </div>
    @endif
</div>

<script src="https://js.stripe.com/v3/"></script>
<script>
    // Create a Stripe client
    var stripe = Stripe('pk_test_51QGxsNJEFieUJXaxtmSOOxTZAjYG3ziCv3xFtVhPX16FuZFw9A2VqEyXpgP56vjCM9zudO9wogWzQA6l9pXd6Ot200NW9K2zpT');
    var elements = stripe.elements();

    // Create an instance of the card Element
    var card = elements.create('card');
    // Add an instance of the card Element into the `card-element` div
    card.mount('#card-element');

    // Handle real-time validation errors from the card Element
    card.on('change', function(event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });

    // Handle form submission
    var form = document.getElementById('payment-form');
    form.addEventListener('submit', function(event) {
        event.preventDefault();

        stripe.createPaymentMethod({
            type: 'card',
            card: card,
        }).then(function(result) {
            if (result.error) {
                // Inform the user if there was an error
                var errorElement = document.getElementById('card-errors');
                errorElement.textContent = result.error.message;
            } else {
                // Send the payment method ID to your server
                var hiddenInput = document.createElement('input');
                hiddenInput.setAttribute('type', 'hidden');
                hiddenInput.setAttribute('name', 'payment_method_id');
                hiddenInput.setAttribute('value', result.paymentMethod.id);
                form.appendChild(hiddenInput);

                // Submit the form
                form.submit();
            }
        });
    });
</script>
</body>
</html>
